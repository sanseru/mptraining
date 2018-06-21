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
         Tambah Data Peserta Baru
         <!-- <small>Data Guru</small>-->
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Tambah Data Peserta Baru</li>
      </ol>
   </section>
   </br>
   </br>
   <section class="content">
      <div class="row">
         <div class="col-xs-12 col-sm-4 col-md-3">&nbsp;</div>
         <div class="col-xs-12 col-sm-4 col-md-6">
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title">Tambah Data Peserta Baru</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">

<?php
    include "koneksi.php";
    if(isset($_POST['submit'])){
      $nm_training=$_POST['nama_mapel'];
      $tgl_training=$_POST['jadwal'];
      $nama=$_POST['nama'];
      $username=$_POST['username'];

      $tgllahir=$_POST['tgllahir'];
      $jk=$_POST['jk'];
      $email=$_POST['email'];
      $no_tlp=$_POST['notlp'];
      $posisi=$_POST['posisi'];
      $perusahaan=$_POST['perusahaan'];
      $notlpper=$_POST['notlpper'];
      $alamat=$_POST['alamat'];

      if (empty($nm_training)or empty($tgl_training)or empty($username)or empty($nama)or empty($tgllahir)or empty($jk)or empty($email)or empty($no_tlp) or empty($posisi) or empty($perusahaan) or empty($notlpper) or empty($alamat)){
        echo "<script language='javascript'>
        alert('Data yang anda masukkan belum lengkap !');
        </script>";
      }else{
        $a="insert into user_in values('','$username','$nama','$tgllahir','$jk','$email','$no_tlp','$posisi','$perusahaan','$notlpper','$alamat','$nm_training','$tgl_training')";
        $b=mysqli_query($koneksi,$a);
        if ($b) {
          echo "<script language='javascript'>
          alert('Data berhasil disimpan');
          </script>";

        }else{
                    echo "<script language='javascript'>
          alert('Data Tidak Berhasil Di Simpan');
          </script>";
        }
      }
    }
    ?>

                     <!-- form start -->
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
     <div class="box-body">
      <div class="form-group">
       <label for="tempatlahir" class="col-sm-2 control-label">Nama Training</label>
       <div class="col-sm-6">
        <select class="form-control" name="nama_mapel" id="nama_mapel">
          <option>Pilih Training...</option>
       <?php
           $mapel="select * from mapel";
           $query=mysqli_query($koneksi,$mapel);
           if ($query=== FALSE){
             die (mysqli_connect_error());}
             while($a=mysqli_fetch_array($query))
             {
              echo "<option value='$a[Nama_mapel]'>$a[Nama_mapel]</option>";
            }
            ?>
        </select>
      </div>
    </div>
    <div class="form-group">
     <label for="tempatlahir" class="col-sm-2 control-label">Tanggal Training</label>
     <div class="col-sm-6">
      <select class="form-control" name="jadwal" id="jadwal">
        <option>Tanggal Training...</option>
       <?php
           $mapel="select * from jadwal";
           $query=mysqli_query($koneksi,$mapel);
           if ($query=== FALSE){
             die (mysqli_connect_error());}
             while($a=mysqli_fetch_array($query))
             {
              echo "<option value='$a[jadwal]'>$a[jadwal]</option>";
            }
            ?>
      </select>
    </div>
  </div>


    <div class="form-group">
   <label for="username" class="col-sm-2 control-label">Username</label>
   <div class="col-sm-10">
    <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username Anda....">
  </div>
</div>

  <div class="form-group">
   <label for="nama" class="col-sm-2 control-label">Nama</label>
   <div class="col-sm-10">
    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Lengkap....">
  </div>
</div>

<!-- Date -->
<div class="form-group">
 <label for="date"  class="col-sm-2 control-label">Tanggal Lahir</label>
 <div class="col-sm-4">
  <div class="input-group date">
   <div class="input-group-addon">
    <i class="fa fa-calendar"></i>
  </div>
  <input type="text" class="form-control pull-right" name="tgllahir" value="" data-date-format="dd-mm-yyyy" id="datepicker">
</div>
</div>
<!-- /.input group -->
</div>
<!-- /.form group -->
<!-- select -->
<div class="form-group">
 <label for="tempatlahir" class="col-sm-2 control-label">Jenis Kelamin</label>
 <div class="col-sm-5">
  <select class="form-control" id="jk" name="jk">
    <option>Pilih Jenis Kelamin...</option>
    <option>Laki - Laki</option>
    <option>Perempuan</option>
  </select>
</div>
</div>

<div class="form-group">
 <label for="nama" class="col-sm-2 control-label">Email</label>
 <div class="col-sm-5">
  <input type="text" class="form-control" id="nama" name="email" placeholder="Masukan Email Lengkap....">
</div>
</div>
<div class="form-group">
 <label for="notlp" class="col-sm-2 control-label">No Telepon</label>
 <div class="col-sm-5">
  <input type="text" class="form-control" name="notlp" id="notlp" placeholder="Masukan No Telepon/ Handphone....">
</div>
</div>

<div class="form-group">
 <label for="nama" class="col-sm-2 control-label">Posisi</label>
 <div class="col-sm-6">
  <input type="text" class="form-control" id="posisi" name="posisi" placeholder="Masukan Nama Lengkap....">
</div>
</div>

<div class="form-group">
 <label for="nama" class="col-sm-2 control-label">Perusahaan</label>
 <div class="col-sm-6">
  <input type="text" class="form-control" id="perusahaan" name="perusahaan" placeholder="Masukan Nama Lengkap....">
</div>
</div>


<div class="form-group">
 <label for="notlp" class="col-sm-2 control-label">No TLP</label>
 <div class="col-sm-10">
  <input type="text" class="form-control" name="notlpper" id="notlp" placeholder="Masukan No Telepon/ Handphone Perusahaan....">
</div>
</div>


<div class="form-group">
  <label class="col-sm-2 control-label">Alamat</label>
  <div class="col-sm-10">
    <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Enter ..."></textarea>
  </div>
</div>




</div>
<!-- /.box-body -->
<div class="box-footer">
  <a href="dataguru.php"><button type="submit" class="btn btn-default">Cancel</button></a>
  <button type="submit" id="simpan" name="submit" class="btn btn-info pull-right">simpan</button>
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