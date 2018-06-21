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
        <li class="active">Data Peserta</li>
      </ol>
    </section>
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
           <!--   <h3 class="box-title">Data Table Guru</h3>-->
              <div class="col-md-6 text-left">
    <button type="button" onclick="location.href='data_peserta_baru.php'" class="btn btn-primary">
        <span class="fa fa-clone">
            </span> Tambah Data</button>
    </div>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead> <tr> 
<th width="5%">No</th> 
<th width="15%">Nama</th>  
<th width="10%">Tanggal Lahir</th>
<th width="10%">Gender</th>
<th width="10%">Email</th>
<th width="10%">Phone</th>
<th width="15%">Nama Tarining</th>
<th width="25%">Date Training</th>
<th>Status</th>
<th width="5%">Aksi</th>

</tr> </thead> 

        <tbody>
<?php
	$a="select * from user_in";
	$b=mysqli_query($koneksi,$a);
	$no=1;
  
	while($c=mysqli_fetch_array($b)){
    $status = $c['status'];
	?>

<tr>
						<td><?php echo $no;?></td>
								<td><?php echo $c['nama'];?></td>
								<td><?php echo $c['tanggal_lahir'];?></td>
								<td><?php echo $c['gender'];?></td>
								<td><?php echo $c['email'];?></td>
                <td><?php echo $c['phone'];?></td>
                <td><?php echo $c['name_training'];?></td>
                <td><?php echo $c['date_training'];?></td>
                <td align="center">
                <?php if($status == '1'){
                  echo "<i class='fa fa-circle text-success'</i>";
                }else {
                  echo "<i class='fa fa-circle text-danger'</i>";

                }
                 ;?>
                <td>
                <a href="javascript:if(confirm('Anda yakin menambahkan Peserta <?php echo $c['nama']; ?>?'))
                {document.location='tmbh_peserta.php?id_user=<?php echo $c['id_user']; ?>';}"><i class="fa fa-check"></i> Tambah</a>
							   </td>
								
</tr>
	  <?php $no++; } ?>


</tbody>
                <tfoot>
                <tr>
<th width="5%">No</th> 
<th width="15%">Nama</th>  
<th width="10%">Tanggal Lahir</th>
<th width="10%">Gender</th>
<th width="10%">Email</th>
<th width="10%">Phone</th>
<th width="15%">Nama Tarining</th>
<th width="25%">Date Training</th>
<th>Status</th>
<th width="5%">Aksi</th>
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