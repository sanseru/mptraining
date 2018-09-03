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

    </div>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
<thead> <tr> 
<th width="5%">No</th> 
<th width="10%">Nis</th> 
<th width="20%">Nama</th>  
<th width="25%">Alamat</th>
<th width="15%">Contact</th>
<th width="25%">Aksi</th>
</tr> </thead>

        <tbody>
<?php
  $a="select * from user_in";
  $b=mysqli_query($koneksi,$a);
  $no=1;
  while($c=mysqli_fetch_array($b)){
  ?>

<tr>
            <td><?php echo $no;?></td>
                <td><?php echo $c['username'];?></td>
                <td><?php echo $c['nama'];?></td>
                <td><?php echo $c['email'];?></td>
                <td><?php echo $c['phone'];?></td>
                <td>
                
                <?php
            $s="select*from tbnilai where Nis='$c[username]'";
            $q=mysqli_query($koneksi,$s);
            $l=mysqli_num_rows($q);
            if($l>0){
              echo "<a href='cetak.php?Nis=$c[username]' target='blank'><i class='fa fa-print'></i>&nbsp;Cetak</a>";
            }else{
              echo "<font  color='red'><b>-</b></font>";
              }
          ?>
                </td>
                
</tr>
    <?php $no++; } ?>

</tbody>
                <tfoot>
                <tr>
<th width="5%">No</th> 
<th width="10%">Nis</th> 
<th width="20%">Nama</th>  
<th width="15%">Agama</th>
<th width="25%">Alamat</th>
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