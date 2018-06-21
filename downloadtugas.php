<?php
   session_start();
   include "inc/head.php";
   include "inc/header.php";
   include "inc/sidebar.php";
   ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Data Tugas
         <!-- <small>Data Guru</small>-->
      </h1>
      <ol class="breadcrumb">
         <li><a href="main.php"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Data Tugas</li>
      </ol>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <div class="box">
               <div class="box-header">
                  <!--   <h3 class="box-title">Data Table Guru</h3>-->
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                     <thead> <tr> 
<th width="5%">No</th> 
<th width="15%">Judul Tugas</th> 
<th width="20%">Aksi</th>
</tr> </thead> 
                     <tbody>
                    <?php
  $a="select * from tbtugas where mapel = '" . mysql_real_escape_string($_SESSION['mapel']) . "'";
  $b=mysqli_query($koneksi,$a);
  $no=1;
  while($c=mysqli_fetch_array($b)){
  ?>
<tr>
                <td><?php echo $no;?></td>              
                <td><?php echo $c['Judul_tugas'];?></td>
                
                <td>
                <a href="files/<?php echo $c['File']; ?>"><i class="fa fa-download"></i> Download </a> 
                
                </td>
                
</tr>
    <?php $no++; } ?>
                     </tbody>
                     <tfoot>
                        <tr>
                          <th width="5%">No</th> 
<th width="15%">Judul Tugas</th> 
<th width="20%">Aksi</th>
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
   include "inc/footer.php";
   ?>