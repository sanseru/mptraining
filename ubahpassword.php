<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['level'])){
    include "koneksi.php";
   include "inc/head.php";
   include "inc/header.php";
   include "inc/sidebar.php";

   if(isset($_POST['ubah'])){
   $passlama = $_POST['passlama'];
   $passbaru = $_POST['passbaru'];
   $konfpassbaru = $_POST['konfpassbaru'];
   
   // mengambil isi record tabel user
   $sql_ubah = "SELECT * FROM user WHERE Username='$_SESSION[username]'";
   $query_ubah = mysqli_query($koneksi,$sql_ubah) or die (mysql_error());
   $eks_qr_ubah = mysqli_fetch_array($query_ubah);
    
   // cek kesesuaian password
   $passenkripsi=md5($passlama);
      if ($passenkripsi == $eks_qr_ubah['Password']){
         if($passbaru==$konfpassbaru)
         {
         $enkripsipassbaru=md5($passbaru);
         $sql_update="UPDATE user SET Password='$enkripsipassbaru' WHERE username='$_SESSION[username]'";
         $qry_update=mysqli_query($koneksi,$sql_update);
            if($qry_update)
            {
            echo "<script language='javascript'>alert('Ubah Password Berhasil !');window.location='login.php'</script>";
            }else
            {
            echo "<script language='javascript'>alert('Ubah Password Gagal !');</script>";
            }
         }else
         {
         echo "<script language='javascript'>alert('Password baru dengan konfirmasi password baru tidak cocok!');</script>";
         }
      }else
      {
      echo "<script language='javascript'>alert('Password lama anda salah!');</script>";
      }
   }
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
Ubah Password         <!-- <small>Data Guru</small>-->
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="#">Tables</a></li>
         <li class="active">Ubah Password</li>
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
                  <h3 class="box-title">Ubah Password</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">

<form class="bs-example form-horizontal" action="" method="post" enctype="multipart/form-data" onsubmit="return confirm('Apakah Anda Yakin Ingin merubah Password Anda?');"> 
<div class="form-group"> 
<label class="col-lg-2 control-label">Password Lama</label> <div class="col-lg-10"> <input type="password" name="passlama" class="form-control" placeholder="Masukkan Password Lama"> </div> </div> 
<div class="form-group"> 
<label class="col-lg-2 control-label">Password Baru</label> <div class="col-lg-10"> <input type="password" name="passbaru" class="form-control" placeholder="Masukkan Password Baru" id="pwd"> </div> </div>
<div class="form-group">
<label class="col-lg-2 control-label">Konfirmasi Password</label> <div class="col-lg-10"> <input type="password" name="konfpassbaru" class="form-control" placeholder="Konfirmasi Password Baru" data-equalto="#pwd" data-required="true"> </div> </div> 

<br>
<a href="main.php"><input type="button" class="btn btn-default" value="Cancel"></input></a> 
<button type="submit" name="ubah" class="btn btn-primary" >Edit</button>

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