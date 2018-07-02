
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="https://www.medikaplaza.com/assets/images/smalllogo-237x104-42.png" type="image/x-icon">
  <title>MedikaPlaza</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/responsive-slider.css" rel="stylesheet">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css"> 
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">	
  <link rel="stylesheet" href="css/select2/dist/css/select2.min.css">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    .color-palette {
      height: 35px;
      line-height: 35px;
    }
  </style>
</head>
<body>
  <header>
    <div class="container">
     <div class="row">
      <nav class="navbar navbar-default" role="navigation">
       <div class="container-fluid">
        <div class="navbar-header">
          <a href="index.html">
            <img src="img/MPlogo.jpg" alt="" style="height:85px;" ></a>

          </div>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div class="menu">
             <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" ><a href="index">Home</a></li>

              <li role="presentation"><a href="schedule">Schedule</a></li>
              <li role="presentation" class="active"><a href="registration">Registration</a></li>
              <!-- <li role="presentation"><a href="portfolio.html">Galery</a></li>-->
              <li role="presentation"><a href="contacts">Contact</a></li>
              <li role="presentation"><a href="login">Login</a></li>
            </ul>
          </div>
        </div>
      </div>			
    </nav>
  </div>
</div>
</header>

<div class="row">
 <div class="col-xs-12 col-sm-4 col-md-3">&nbsp;</div>
 <div class="col-xs-12 col-sm-4 col-md-6">
  <div class="box box-primary">
   <div class="box-header with-border">
    <h3 class="box-title">Daftar Training</h3>
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
        $a="insert into user_in values('','$username','$nama','$tgllahir','$jk','$email','$no_tlp','$posisi','$perusahaan','$notlpper','$alamat','$nm_training','$tgl_training','0')";
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
    <input type="text" class="form-control" id="check_username" name="username" placeholder="Masukan Username Anda....">
    <div p class="help-block check_username_result"></div>
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

<div class="container">
  <div class="row">

    <div class="col-sm-4 color-palette" style="background-color:#0080C8;"></div>
    <div class="col-sm-4 color-palette" style="background-color:#004F7B;"></div>
    <div class="col-sm-4 color-palette" style="background-color:#38B5AA;"></div>



  </div>
</div>

<footer>
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <div class="widget">
          <!-- <h5 class="widgetheading">Get in touch with us</h5>-->
          <address>
            <strong>HEAD OFFICE</strong><br>
            BELTWAY OFFICE PARK, TOWER C, 2nd Floor,<br> 
            Jl. TB. Simatupang Kav. 41. Jakarta 12550
          </address>
          
          <i>PHONE:</i>+62 21 808 66 088<br>
          <i>Mail:</i> marketing@medikaplaza.com
          
        </div>
      </div>
      <div class="col-lg-3">
        <div class="widget">
          <address>
            <strong>MP - BELTWAY CLINIC
            </strong><br>
            BELTWAY OFFICE PARK, ANNEX BUILDING, <br> 
            Ground Floor, Jl. TB. Simatupang Kav. 41. <br>
            Jakarta 12550
          </address>
          
          <i>PHONE:</i>+62 021 808 66 099<br>
          <i>FAX:</i> +62 21 808 66 098
          
        </div>
      </div>
      <div class="col-lg-3">
        <div class="widget">
          <address>
            <strong>MP - WTC 2 CLINIC</strong><br>
            World Trade Center 2, Lower Ground Floor, <br> 
            Jl. Jend. Sudirman, Kav. 29 Jakarta 12920
          </address>
          
          <i>PHONE</i>+62 21 295 22 611<br>
          <i>FAX</i> +62 21 295 22 610
          
        </div>
      </div>
      <div class="col-lg-3">
        <div class="widget">
          <strong style="color:red; font-size:20px;" >24/7 HELP LINE</strong>

          <h4><b style="color:red;" > <i class="fa fa-phone"></i> 1500 918</h4>
            <h4><b style="color:red;">+62 21 8086 6000 </b></h4>
          </div>
          <div class="clear">
          </div>
        </div>
      </div>
    </div>

    <div class="container">
     <div class="row">
      <hr>
    </div>
  </div>

  <div id="sub-footer">
   <div class="container">
    <div class="row">
     <div class="col-lg-6">
      <div class="copyright">
       <p>
         <span>&copy; Haris Lukman Hakim 2018. By </span><a href="http://medikaplaza.com" target="_blank">MedikaPlaza</a>
       </p>
                            <!-- 
                                All links in the footer should remain intact. 
                                Licenseing information is available at: http://bootstraptaste.com/license/
                                You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Arsha
                              -->
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <ul class="social-network">
                             <li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook fa-1x"></i></a></li>
                             <li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter fa-1x"></i></a></li>
                             <li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin fa-1x"></i></a></li>
                             <li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest fa-1x"></i></a></li>
                             <li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus fa-1x"></i></a></li>
                           </ul>
                         </div>
                       </div>
                     </div>
                   </div>
                 </footer>



                 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                 <script src="js/jquery.js"></script>
                 <!-- Include all compiled plugins (below), or include individual files as needed -->
                 <script src="js/bootstrap.min.js"></script>
                 <script src="js/responsive-slider.js"></script>
                 <script src="js/wow.min.js"></script>
                 <script src="js/jquery.magnific-popup.js"></script>
                 <script src="js/functions.js"></script>
                 <script src="css/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
                 <!-- Select2 -->
                 <script src="css/select2/dist/js/select2.full.min.js"></script>
                 <script>
                   wow = new WOW(
                   {

                   }	) 
                   .init();

                   $('#datepicker').datepicker({
                    autoclose: true
                  })
                </script>

                <script>
                  $(document).ready(function() {

      // jumlah karakter minimal
      var jum_karakter_minimal = 3;

      // pesan error jika username < 3
      var karakter_minimal_error = "Karakter kurang dari 3";

      // pesan cek username
      var pesan_cek = 'cek username ...';

      // variabel username
      var check_username = $('#check_username');

      // variabel result hasil cek
      var check_username_result = $('.check_username_result')

      // menggunakan onkeyup untuk mendeteksi setiap inputan
      check_username.on('keyup', function(){

        if(check_username.val().length <= jum_karakter_minimal) {
          
          check_username_result.html(karakter_minimal_error);

        } else {

          check_username_result.html(pesan_cek);

          // check username
          cek_username();
        }

      });



      // fungsi untuk mengecek username
      function cek_username() {
        // mendapatkan username
        var username = $('input[name="username"]').val();

        // mengirimkan username ke check_username.php
        $.post("check_username.php", { username: username }, function(result) {

          // jika hasilnya 1, tampilkan pesan tersedia
          if(result == 1) {
            check_username_result.html('<b><font color="red"><strong>'+username+'</strong> tersedia </font></b>');

          // jika hasilnya 0, tampilkan pesan user tidak tersedia
        } else {
          check_username_result.html('<font color="red" <strong><b>'+username+'</b></strong> </font> tidak tersedia/ sudah ada yang menggunakan silahkan gunakan username lainnya');         
        }
      });
      }

    });

  </script>
</body>
</html>