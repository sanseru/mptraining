<?php
session_start();
   if(($_SESSION['level']=="admin")||($_SESSION['level']=="guru")){

include "inc/head.php";
include "inc/header.php";
include "inc/sidebar.php";
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
      <h1>
        Data Peserta
       <!-- <small>Data Guru</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="main.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data tugas</li>
      </ol>
    </section>
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
           <!--   <h3 class="box-title">Data Table Guru</h3>-->

            </div>

<?php
if(isset($_POST['simpan'])){
$nama=$_SESSION['username'];
$judul=$_POST['nama_mapel'];
$lokasi_file= $_FILES['upload']['tmp_name'];
$nama_file=$_FILES['upload']['name'];
$folder= "files/$nama_file";
if(move_uploaded_file($lokasi_file,"$folder")){
if(empty($judul) || empty($nama_file)){
echo "<script language='javascript'>
alert('Data belum lengkap');
</script>"; 
}else{
$sql="insert into tbtugas values('','$nama','$judul','$nama_file','$judul')";
$query=mysqli_query($koneksi,$sql) ;
		if ($query) {
		echo"<script language='javascript'>
alert('Data berhasil disimpan');
</script>";
		}
}
}
}

?>
<form class="bs-example form-horizontal" method="post" action="" enctype="multipart/form-data"> 
 
<div class="form-group"> 
<label class="col-lg-2 control-label">Judul Tugas</label> <div class="col-lg-5"> 
 <select class="form-control" name="nama_mapel" id="nama_mapel">
          <option>Pilih Training...</option>
       <?php
           $mapel="select * from mapel";
           $query=mysqli_query($koneksi,$mapel);
           if ($query=== FALSE){
             die (mysqli_connect_error());}
             while($a=mysqli_fetch_array($query))
             {
              echo "<option value='$a[Nama_mapel]'>$a[Nama_mapel]</option>";
            }
            ?>
        </select> </div> </div> 

<div class="form-group"> <label class="col-sm-2 control-label">File Tugas</label> 
<div class="col-sm-10"> 
<input type="file" name="upload" class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline input-s">
</div> </div>
        <div class="col-xs-12">

<br>
<a href="tugas.php"><input type="button" class="btn btn-default" value="Cancel"></input></a> 
<button type="submit" name="simpan" class="btn btn-primary">Save Change</button><br><br>
</div>
</form> 

<br>




            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead> <tr> 
<th width="5%">No</th> 
<th width="10%">ID TUGAS</th> 
<th width="20%">JUDUL TUGAS</th>  
<th width="15%">FILE</th>
<th width="25%">Aksi</th>
</tr> </thead> 

        <tbody>
<?php
	$a="select * from tbtugas";
	$b=mysqli_query($koneksi,$a);
	$no=1;
	while($c=mysqli_fetch_array($b)){
	?>

<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $c['Id_tugas'];?></td>
								<td><?php echo $c['Judul_tugas'];?></td>
								<td><?php echo $c['File'];?></td>
								
								<td>
								<a href="javascript:if(confirm('Anda yakin menghapus ini?'))
								{document.location='hapustugas.php?Id_tugas=<?php echo $c['Id_tugas']; ?>';}"><i class="fa fa-trash-o"></i> Hapus</a>
								</td>
								
</tr>
	  <?php $no++; } ?>


</tbody>
                <tfoot>
                <tr>
                <th width="5%">No</th> 
<th width="10%">ID TUGAS</th> 
<th width="20%">JUDUL TUGAS</th>  
<th width="15%">FILE</th>
<th width="25%">Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</div>
<?php
 }else{
echo "<script language='javascript'>
alert('maaf anda tidak bisa mengakses halaman ini!');
document.location='main.php';
</script>";
}
include "inc/footer.php";
?>