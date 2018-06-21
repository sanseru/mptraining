<?php 
session_start();
include "header.php";
include "sidebar_dalam.php";
?>


<!-- Content Mulai -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Table With Full Features</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-striped">
<thead> <tr> 
<th width="5%">No</th> 
<th width="10%">Nis</th> 
<th width="20%">Nama</th>  
<th width="15%">Agama</th>
<th width="15%">Alamat</th>
<th width="15%">Contact</th>
<th width="25%">Aksi</th>
</tr> </thead> 
<tbody>
<?php
	$a="select * from siswa";
	$b=mysqli_query($koneksi,$a);
	$no=1;
	while($c=mysqli_fetch_array($b)){
	?>

<tr>
						<td><?php echo $no;?></td>
								<td><?php echo $c['Nis'];?></td>
								<td><?php echo $c['Nama'];?></td>
								<td><?php echo $c['Agama'];?></td>
								<td><?php echo $c['Alamat'];?></td>
								<td><?php echo $c['No_hp'];?></td>
								<td>
								<a href="ubahsiswa.php?Nis=<?php echo $c['Nis'];?>"><i class="fa fa-edit"></i> Ubah</a> | 
								<a href="javascript:if(confirm('Anda yakin menghapus ini?'))
								{document.location='hapussiswa.php?Nis=<?php echo $c['Nis']; ?>';}"><i class="fa fa-trash-o"></i> Hapus</a>
								</td>
								
</tr>
	  <?php $no++; } ?>


</tbody>
</table>
</div>
              </div>

      </div>
    </div>
  </section>
</div>
  <!-- /.content-wrapper -->
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
<?php

include "footer_dalam.php";
?>
