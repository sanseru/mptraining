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
       Data Guru
       <!-- <small>Data Guru</small>-->
     </h1>
     <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       <li><a href="#">Tables</a></li>
       <li class="active">Tambah Soal</li>
     </ol>
   </section>
 </br>
 <section class="content">
  <div class="row">
   <div class="col-xs-12 col-sm-4 col-md-2">&nbsp;</div>
   <div class="col-xs-12 col-sm-4 col-md-8">


    <div class="box box-primary">
     <div class="box-header with-border">
      <h3 class="box-title">Tambah Soal</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

      <?php
      if(isset($_POST['submit'])){
        $kd_mapel=$_POST['kd_mapel'];
        $soal=$_POST['text-ckeditor'];
        $jawaban=$_POST['jawaban'];
        $pilihan1=$_POST['pilihan1'];
        $pilihan2=$_POST['pilihan2'];
        $pilihan3=$_POST['pilihan3'];
        if(empty($kd_mapel) or empty($soal) or empty($jawaban) or empty($pilihan1) or empty($pilihan2) or empty($pilihan3)){
          echo "<script language='javascript'>
          alert('Data belum lengkap');
          </script>"; 
        }else{
          $sql="insert into tbsoal values('','$kd_mapel','$soal','$jawaban','$pilihan1','$pilihan2','$pilihan3','')";
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
         <label for="tempatlahir" class="col-sm-2 control-label">Soal</label>
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


      <div class="form-group">
       
       <label for="tempatlahir" class="col-sm-2 control-label">Matkul</label>
       <div class="col-sm-10">

        <textarea id="editor1" name="text-ckeditor" rows="10" cols="80">
          
        </textarea>

      </div>
      
    </div>




    <div class="form-group">
      <label class="col-sm-2 control-label">Jawaban</label>
      <div class="col-sm-10">
        <textarea class="form-control" name="jawaban" id="jawaban" rows="3" placeholder="Enter ..."></textarea>
      </div>
    </div>


    <div class="form-group">
      <label class="col-sm-2 control-label">Pilihan 1</label>
      <div class="col-sm-10">
        <textarea class="form-control" name="pilihan1" id="pilihan1" rows="3" placeholder="Enter ..."></textarea>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Pilihan 2</label>
      <div class="col-sm-10">
        <textarea class="form-control" name="pilihan2" id="pilihan2" rows="3" placeholder="Enter ..."></textarea>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Pilihan 3</label>
      <div class="col-sm-10">
        <textarea class="form-control" name="pilihan3" id="pilihan3" rows="3" placeholder="Enter ..."></textarea>
      </div>
    </div>



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