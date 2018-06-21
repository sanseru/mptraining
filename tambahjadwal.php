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
       Data Jadwal
       <!-- <small>Data Guru</small>-->
     </h1>
     <ol class="breadcrumb">
       <li><a href="main.php"><i class="fa fa-dashboard"></i> Home</a></li>
       <li class="active">Tambah Jadwal</li>
     </ol>
   </section>
 </br>
 <section class="content">
  <div class="row">
   <div class="col-xs-12 col-sm-4 col-md-3">&nbsp;</div>
   <div class="col-xs-12 col-sm-4 col-md-6">


    <div class="box box-primary">
     <div class="box-header with-border">
      <h3 class="box-title">Tambah Soal</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

      <?php
      if(isset($_POST['submit'])){
        $kd_mapel=$_POST['kd_mapel'];
        $jadwal=$_POST['jadwal'];
        if(empty($kd_mapel) or empty($jadwal)){
          echo "<script language='javascript'>
          alert('Data belum lengkap');
          </script>"; 
        }else{
          $sql="insert into jadwal values('','$kd_mapel','$jadwal')";
          $query=mysqli_query($koneksi,$sql) or die(mysqli_connect_error());
          if ($query) {
            echo"<script language='javascript'>
            alert('Data berhasil disimpan');
            </script>";
          }
        }
      }
      ?>

      <!-- form start -->
      <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
       <div class="box-body">


        <!-- select -->
        <div class="form-group">
         <label for="tempatlahir" class="col-sm-2 control-label">Mata Pelajaran</label>
         <div class="col-sm-5">
          <select class="form-control" id="kd_mapel" name="kd_mapel">
           <option>Pilih Matkul</option>
           <?php
           $mapel="select * from mapel";
           $query=mysqli_query($koneksi,$mapel);
           if ($query=== FALSE){
             die (mysqli_connect_error());}
             while($a=mysqli_fetch_array($query))
             {
              echo "<option value='$a[Kd_mapel]'>$a[Nama_mapel]</option>";
            }
            ?>
          </select>
        </div>
      </div>



              <!-- Date range -->
              <div class="form-group">
                <label  class="col-sm-2 control-label">Date range:</label>
                <div class="col-sm-8">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" data-date-format="dd-mm-yyyy" id="reservation" name="jadwal">
                </div>
              </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->


  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    <a href="dataguru.php"><button type="submit" class="btn btn-default">Cancel</button></a>
    <button type="submit" id="submit" name="submit" class="btn btn-info pull-right">simpan</button>
  </div>
  <!-- /.box-footer -->
</form>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
</div>
</div>
</section>
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