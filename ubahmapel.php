<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['level'])){
    include "koneksi.php";
   include "inc/head.php";
   include "inc/header.php";
   include "inc/sidebar.php";
if(isset($_GET['Kd_mapel'])){
$kd=$_GET['Kd_mapel'];
$sql="select * from mapel where Kd_mapel='$kd'";
$query=mysqli_query($koneksi,$sql);
$data=mysqli_fetch_array($query);
}else{
echo "Data yang diubah belum ada";
}
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
         <li class="active">Tambah Siswa</li>
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
                  <h3 class="box-title">Daftar Guru Baru</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
<?php
if(isset($_POST['ubah'])){
$nama_mapel=$_POST['nama_mapel'];
$jmlh_soal=$_POST['jmlh_soal'];
$status_soal=$_POST['status_soal'];
$ulang=$_POST['ulang'];
$jam=$_POST['jam'];
$menit=$_POST['menit'];
$detik=$_POST['detik'];

if(empty($nama_mapel) || empty($jmlh_soal) || empty($status_soal) || empty($ulang) || empty($jam) || empty($menit) || empty($detik)){
echo "<script language='javascript'>
alert('Data belum lengkap');
</script>"; 
}else{
$sql="UPDATE mapel SET Nama_mapel='$nama_mapel', Jumlah_soal='$jmlh_soal',Status='$status_soal', Ulang='$ulang',Jam='$jam',Menit='$menit',Detik='$detik' where Kd_mapel='$kd'";
$que=mysqli_query($koneksi,$sql) ;
      if ($que) {
      echo"<script language='javascript'>
alert('Ubah Data Berhasil');
document.location='datamapel.php';
</script>";
      }
}
}

?>


 <form class="form-horizontal" method="post" enctype="multipart/form-data">
                     <div class="box-body">
                        <div class="form-group">
                           <label for="NIP" class="col-sm-2 control-label">Kode Mata Pelajaran</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="nip" name="kd_mapel" placeholder="Masukan Kode Mata Pelajaran" value="<?php echo $data['Kd_mapel'];?>" disabled>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="nama" class="col-sm-2 control-label">Nama Mata Pelajaran</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="namamepl" name="nama_mapel" placeholder="Masukan Nama Mata Pelajran...." value="<?php echo $data['Nama_mapel'];?>">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="tempatlahir" class="col-sm-2 control-label">Jumlah Soal</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="jmlh_soal" name="jmlh_soal" value="<?php echo $data['Jumlah_soal'];?>" placeholder="Masukan Jumlah Soal....">
                           </div>
                        </div>
                           <div class="form-group">
                           <label for="tempatlahir" class="col-sm-2 control-label">Status Soal</label>
                           <div class="col-sm-10">
                             <input type="radio" name="status_soal" id="optionsRadios1" value='aktif' <?php if ($data['Status']=="aktif"){echo "checked";}?> > Aktif &nbsp;&nbsp;&nbsp;&nbsp;
                             <input type="radio" name="status_soal" id="optionsRadios1" value='Tidak Aktif'  <?php if ($data['Status']=="Tidak Aktif"){echo "checked";}?> > Tidak Aktif
                           </div>
                        </div>

                        <div class="form-group">
                           <label for="tempatlahir" class="col-sm-2 control-label">Ulang</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="ulang" name="ulang" value="<?php echo $data['Ulang'];?>" placeholder="Masukan Ulang....">
                           </div>
                        </div>

                        <div class="form-group">
                           <label for="nama" class="col-sm-2 control-label">Waktu</label>
                           <div class="col-sm-10">
                                      <label><input name='jam' type='text' id='jam' size='10' class="form-control" value="<?php echo $data['Jam'];?>"/></label>&nbsp;&nbsp;Jam   
  
      <label><input name='menit' class="form-control" type='text' id='menit' size='10' placeholder="dua digit angka" value="<?php echo $data['Menit'];?>"/></label>&nbsp;&nbsp;Menit 
      <label><input name='detik' type='text' class="form-control" id='detik' size='10' placeholder="dua digit angka" value="<?php echo $data['Detik'];?>"/></label>
      &nbsp;&nbsp;Detik
                           </div>
                        </div>



                     </div>
                     <!-- /.box-body -->
                     <div class="box-footer">
<a href="dataguru.php"><button type="submit" class="btn btn-default">Cancel</button></a>
                      <button type="submit" id="simpan" name="ubah" class="btn btn-info pull-right">simpan</button>
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