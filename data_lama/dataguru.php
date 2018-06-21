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
    </br>
    <div class="col-md-6 text-left">
    <button type="button" onclick="location.href='data-kriteria-baru.php'" class="btn btn-primary">
        <span class="fa fa-clone">
            </span> Tambah Data</button>
    </div>
    </br>
    </br>
    <!-- Main content -->
    <section class="content">
    
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <!--<h3 class="box-title">Selamat Datang Di</h3>-->
              <table class="table table-striped m-b-none" > 
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
</table>
              </div>
              </div>
              </div>
              </div>
</section>
  <!-- /.content-wrapper -->

<?php

include "footer_dalam.php";
?>
