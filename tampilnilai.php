<?php
     session_start();
   if(isset($_SESSION['username']) && isset($_SESSION['level'])){
    include "koneksi.php";
   include "inc/head.php";
   include "inc/header.php";
   include "inc/sidebar.php";

   ?>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
      <h1>
        Data Nilai
       <!-- <small>Data Guru</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Nilai</li>
      </ol>
    </section>
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
           <!--   <h3 class="box-title">Data Table Guru</h3>-->
              <div class="col-md-6 text-left">
 
    </div>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead> <tr> 
<th width="5%">No</th> 
<th width="15%">Nama Mapel</th> 
<th width="15%">Nis</th> 
<th width="15%">Nama Siswa</th> 
<th width="5%">Salah</th>
<th width="5%">Benar</th>
<th width="15%">Nilai</th>
<th width="15%">Tanggal</th>
<th width="15%">Ujian Ke</th>
</tr> </thead> 

        <tbody>
<?php
  // $a="select * from tbnilai,mapel,siswa where mapel.Kd_mapel=tbnilai.Kd_mapel AND siswa.Nis=tbnilai.Nis AND tbnilai.Nis='$_SESSION[username]'";
  $a= "SELECT 
    *,b.nama,c.Nama_mapel
FROM
    tbnilai a
    LEFT JOIN
    user_in b ON b.username = a.nis
    LEFT JOIN
    mapel c ON c.kd_mapel = a.kd_mapel
    where a.Nis = '$_SESSION[username]'";

	$b=mysqli_query($koneksi,$a);
	$no=1;
	while($c=mysqli_fetch_array($b)){
	?>

<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $c['Nama_mapel'];?></td>
								<td><?php echo $c['Nis'];?></td>
								<td><?php echo $c['nama'];?></td>
								<td><?php echo $c['Salah'];?></td>
								<td><?php echo $c['Benar'];?></td>
								<td><?php echo $c['Nilai'];?></td>
								<td><?php echo $c['Tanggal'];?></td>
								<td><?php echo $c['Ujian_ke'];?></td>
								
</tr>
	  <?php $no++; } ?>



</tbody>
                <tfoot>
                <tr>
<th width="5%">No</th> 
<th width="15%">Nama Mapel</th> 
<th width="15%">Nis</th> 
<th width="15%">Nama Siswa</th> 
<th width="5%">Salah</th>
<th width="5%">Benar</th>
<th width="15%">Nilai</th>
<th width="15%">Tanggal</th>
<th width="15%">Ujian Ke</th>
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
alert('maaf anda tidak bisa mengakses, mohon login dulu!');
document.location='index.php';
</script>";
}
include "inc/footer.php";
?>