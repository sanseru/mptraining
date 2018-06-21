<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['level'])){
  include "koneksi.php";
  include "inc/head.php";
  include "inc/header.php";
  include "inc/sidebar.php";

  ?>

  <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
    <h1>
     Data Soal
     <!-- <small>Data Guru</small>-->
   </h1>
   <ol class="breadcrumb">
     <li><a href="main.php"><i class="fa fa-dashboard"></i> Home</a></li>
     <li class="active">Data Soal</li>
   </ol>
 </section>
 <section class="content">
  <div class="row">
   <div class="col-xs-12">
    <div class="box">
     <div class="box-header" >
      <!--   <h3 class="box-title">Data Table Guru</h3>-->
      <div class="col-md-6 text-left">

      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-hover">
        <thead> <tr> 
          <th >No</th> 
          <th >Aksi</th>
          <th >Nama Mapel</th> 
          <th >Ulang</th> 
          <th >Waktu</th> 
        </tr> </thead> 
        <tbody>
         <?php


         $a="select * from mapel where Nama_mapel = '" . mysql_real_escape_string($_SESSION['mapel']) . "'";
         $b=mysqli_query($koneksi,$a);
         $no=1;
         while($c=mysqli_fetch_array($b)){
           ?>

           <tr>
            <td><?php echo $no;?></td>
            <td>
              <a href="tampilsoal.php?Kd_mapel=<?php echo $c['Kd_mapel'];?>"><i class="fa fa-book"></i> Kerjakan Ujian</a>
              
            </td>
            <td><?php echo $c['Nama_mapel'];?></td>
            <td><?php echo $c['Ulang'];?></td>
            <td><?php echo $c['Jam'];?> : <?php echo $c['Menit'];?> : <?php echo $c['Detik'];?></td>
            
            
          </tr>
          <?php $no++; } ?>
        </tbody>
        <tfoot>
          <tr>
           <th>No</th> 
           <th>Aksi</th>

           <th >Nama Mapel</th> 
           <th >Ulang</th> 
           <th >Waktu</th> 
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