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
         Data Mata Pelajaran
         <!-- <small>Data Guru</small>-->
      </h1>
      <ol class="breadcrumb">
         <li><a href="main.php"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Data Mapel</li>
      </ol>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <div class="box">
               <div class="box-header" >
                  <!--   <h3 class="box-title">Data Table Guru</h3>-->
                  <div class="col-md-6 text-left">
                     <button type="button" onclick="location.href='tambahmapel.php'" class="btn btn-primary">
                     <span class="fa fa-clone">
                     </span> Tambah Data</button>
                  </div>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead> <tr> 
                  <th width="5%">No</th> 
                  <th width="15%">Kode Mapel</th> 
                  <th width="15%">Nama Mapel</th> 
                  <th width="15%">Jumlah Soal</th> 
                  <th width="15%">Status</th>
                  <th width="5%">Ulang</th>
                  <th width="15%">Waktu</th>
                  <th width="25%">Aksi</th>
                  </tr> </thead> 
                     <tbody>
                     <?php
	$a="select * from mapel";
	$b=mysqli_query($koneksi,$a);
	$no=1;
	while($c=mysqli_fetch_array($b)){
	?>

<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $c['Kd_mapel'];?></td>
								<td><?php echo $c['Nama_mapel'];?></td>
								<td><?php echo $c['Jumlah_soal'];?></td>
								<td><?php echo $c['Status'];?></td>
								<td><?php echo $c['Ulang'];?></td>
								<td><?php echo $c['Jam'];?> : <?php echo $c['Menit'];?> : <?php echo $c['Detik'];?></td>
								<td>
								<a href="ubahmapel.php?Kd_mapel=<?php echo $c['Kd_mapel'];?>"><i class="fa fa-edit"></i> Ubah</a> | 
								<a href="javascript:if(confirm('Anda yakin menghapus ini?'))
								{document.location='hapusmapel.php?Kd_mapel=<?php echo $c['Kd_mapel']; ?>';}"><i class="fa fa-trash-o"></i> Hapus</a>
								</td>
								
</tr>
	  <?php $no++; } ?>
                     </tbody>
                     <tfoot>
                        <tr>
                        <th width="5%">No</th> 
                        <th width="15%">Kode Mapel</th> 
                        <th width="15%">Nama Mapel</th> 
                        <th width="15%">Jumlah Soal</th> 
                        <th width="15%">Status</th>
                        <th width="5%">Ulang</th>
                        <th width="15%">Waktu</th>
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
   include "inc/footer.php";
   ?>