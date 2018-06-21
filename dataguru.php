<?php
session_start();
   if($_SESSION['level']=="admin"){

include "inc/head.php";
include "inc/header.php";
include "inc/sidebar.php";
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
      <h1>
        Data Trainer
       <!-- <small>Data Guru</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="main.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Trainer</li>
      </ol>
    </section>
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
           <!--   <h3 class="box-title">Data Table Guru</h3>-->
              <div class="col-md-6 text-left">
    <button type="button" onclick="location.href='tambahguru.php'" class="btn btn-primary">
        <span class="fa fa-clone">
            </span> Tambah Data</button>
    </div>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead> <tr> 
<th width="5%">No</th> 
<th width="10%">Nip</th> 
<th width="20%">Nama</th> 
<th width="15%">Agama</th> 
<th width="15%">Alamat</th>
<th width="15%">Contact</th>
<th width="25%">Aksi</th>
</tr> </thead> 


        <tbody>
<?php
  $a="select * from guru";
  $b=mysqli_query($koneksi,$a);
  $no=1;
  while($c=mysqli_fetch_array($b)){
  ?>

<tr>
            <td><?php echo $no;?></td>
                <td><?php echo $c['Nip'];?></td>
                <td><?php echo $c['Nama_guru'];?></td>
                <td><?php echo $c['Agama'];?></td>
                <td><?php echo $c['Alamat'];?></td>
                <td><?php echo $c['No_hp'];?></td>
                <td>
                <a href="ubahguru.php?Nip=<?php echo $c['Nip'];?>"><i class="fa fa-edit"></i> Ubah</a> | 
                <a href="javascript:if(confirm('Anda yakin menghapus ini?'))
                {document.location='hapusguru.php?Nip=<?php echo $c['Nip']; ?>';}"><i class="fa fa-trash-o"></i> Hapus</a>
                </td>
                
</tr>
    <?php $no++; } ?>


</tbody>
                <tfoot>
                <tr>
                  <th width="5%">No</th> 
<th width="10%">Nip</th> 
<th width="20%">Nama</th> 
<th width="15%">Agama</th> 
<th width="15%">Alamat</th>
<th width="15%">Contact</th>
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