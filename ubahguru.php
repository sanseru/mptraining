<?php
     session_start();
   if(isset($_SESSION['username']) && isset($_SESSION['level'])){
    include "koneksi.php";
   include "inc/head.php";
   include "inc/header.php";
   include "inc/sidebar.php";
if(isset($_GET['Nip'])){
$nip=$_GET['Nip'];
$sql="select * from guru where Nip='$nip'";
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
         <li class="active">Data Soal</li>
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
if(isset($_POST['submit'])){
$nip=$_POST['nip'];
$nipe=md5($_POST['nip']);
$nama=$_POST['nama'];
$tlahir=$_POST['tlahir'];
$tgllahir=$_POST['tgllahir'];
$jk=$_POST['jk'];
$agama=$_POST['agama'];
$alamat=$_POST['alamat'];
$nohp=$_POST['notlp'];
$foto=$_FILES['foto']['name'];
   if(strlen($foto)){
      if(is_uploaded_file($_FILES['foto']['name'])){
        move_uploaded_file($_FILES['foto']['name'],"images/".$foto);
      }
      mysqli_query($koneksi,"update guru set foto='$foto' where username='$_SESSION[username]'");
    }
    if (empty($nip) or empty($nama) or empty($tlahir)or empty($tgllahir)or empty($jk)or empty($agama)or empty($alamat)or empty($nohp)){
      echo "<script language='javascript'>
alert('Data yang anda masukkan belum lengkap !');
</script>";
    }else{
    $a="insert into guru values('$nip','$nama','$tlahir','$tgllahir','$jk','$agama','$alamat','$nohp','$foto')";
    $x="insert into user values('$nama','$nip','$nipe','$foto','guru')";
      $y=mysqli_query($koneksi,$x);
    $b=mysqli_query($koneksi,$a);
    move_uploaded_file($_FILES['foto']['tmp_name'], "images/".$_FILES['foto']['name']);
      if ($b) {
        echo "<script language='javascript'>
alert('Data berhasil disimpan');
</script>";

      }
    }
}
?>

                  <!-- form start -->
                  <form class="form-horizontal" method="post" enctype="multipart/form-data">
                     <div class="box-body">
                        <div class="form-group">
                           <label for="NIP" class="col-sm-2 control-label">NIP</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="nip" name="nip" value="<?php echo $data['Nip'];?>">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="nama" class="col-sm-2 control-label">Nama</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['Nama_guru'];?>">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="tempatlahir" class="col-sm-2 control-label">Tempat Lahir</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="tlahir" name="tlahir" value="<?php echo $data['Tempat_lahir'];?>">
                           </div>
                        </div>
                        <!-- Date -->
                        <div class="form-group">
                           <label for="date"  class="col-sm-2 control-label">Tanggal Lahir</label>
                           <div class="col-sm-10">
                              <div class="input-group date">
                                 <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                 </div>
                                 <input type="text" class="form-control pull-right" name="tgllahir" value="<?php echo $data['Tanggal_lahir'];?>" data-date-format="dd-mm-yyyy" id="datepicker">
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
<option value="Laki-Laki" <?php if ($data['JK']=="Laki-Laki"){echo "selected";}?>>Laki-Laki</option> 
<option value="Perempuan" <?php if ($data['JK']=="Perempuan"){echo "selected";}?>>Perempuan</option> 
                              </select>
                           </div>
                        </div>

                          <div class="form-group">
                           <label for="tempatlahir" class="col-sm-2 control-label">Agama</label>
                           <div class="col-sm-5">
                              <select class="form-control" name="agama" id="agama">
<option value="Islam" <?php if ($data['Agama']=="Islam"){echo "selected";}?> >Islam</option> 
<option value="Hindu" <?php if ($data['Agama']=="Hindu"){echo "selected";}?>>Hindu</option>
<option value="Budha" <?php if ($data['Agama']=="Budha"){echo "selected";}?>>Budha</option> 
<option value="Kristen" <?php if ($data['Agama']=="Kristen"){echo "selected";}?>>Kristen</option>
<option value="Lainnya.." <?php if ($data['Agama']=="Lainnya.."){echo "selected";}?>>Lainnya..</option>  

                              </select>
                           </div>
                        </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                  <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Enter ...">
                    <?php echo $data['Alamat'];?>
                  </textarea>
                </div>
                </div>
                        <div class="form-group">
                           <label for="notlp" class="col-sm-2 control-label">Nomor Telepon</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" name="notlp" id="notlp" value="<?php echo $data['No_hp'];?>">
                           </div>
                        </div>

                  <div class="form-group">
                  <label  class="col-sm-2 control-label">Photo</label>
                   <div class="col-sm-10">

                  <input type="file" name="foto" value="">
                  <?php echo $data['Foto'];?>
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