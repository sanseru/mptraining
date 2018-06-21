<?php
session_start();

include 'PHPMailer/PHPMailerAutoload.php';
if(isset($_SESSION['username']) && isset($_SESSION['level'])){
include "koneksi.php";
//hapus
if(isset($_GET['id_user'])){
	$kode=$_GET['id_user'];
$nama='';
$nmp='';
	$a="select*from user_in where id_user='$kode'";
	$b=mysqli_query($koneksi,$a);
	$c=mysqli_fetch_array($b);
	$nama=$c['nama'];
	$username=$c['username'];
	$nmp=md5($c['username']);
  $name_training=$c['name_training'];
      $z="update user_in set status=1 where id_user='$kode'";
	    $x="insert into user values('$nama','$username','$nmp','','siswa','$name_training')";
	$query=mysqli_query($koneksi,$x);
  $query2=mysqli_query($koneksi,$z);
$mail = new PHPMailer;

// Konfigurasi SMTP
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'harislukmanhakim@gmail.com';
$mail->Password = 'lukmanhakim1805';
$mail->SMTPSecure = 'tls';
$mail->Port = 587; 
$mail->setFrom('lukmanhakim1805@yahoo.com', 'Haris Lukman Hakim');
$mail->addReplyTo('lukmanhakim1805@yahoo.com', 'Haris Lukman Hakim');
$mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);
// Menambahkan penerima
$mail->addAddress($c['email']);

// Menambahkan beberapa penerima
//$mail->addAddress('penerima2@contoh.com');
//$mail->addAddress('penerima3@contoh.com');

// Menambahkan cc atau bcc 
//$mail->addCC('cc@contoh.com');
//$mail->addBCC('bcc@contoh.com');

// Subjek email
$mail->Subject = 'Password dan Email ';

// Mengatur format email ke HTML
$mail->isHTML(true);

// Konten/isi email
$mailContent = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>A Simple Responsive HTML Email</title>
  <style type="text/css">
  body {margin: 0; padding: 0; min-width: 100%!important;}
  img {height: auto; background: white; -webkit-box-shadow: -7px -2px 56px -15px rgba(0,0,0,1);
-moz-box-shadow: -7px -2px 56px -15px rgba(0,0,0,1);
box-shadow: -7px -2px 56px -15px rgba(0,0,0,1);}
  .content {width: 100%; max-width: 600px;}
  .header {padding: 40px 30px 20px 30px;}
  .innerpadding {padding: 30px 30px 30px 30px;}
  .borderbottom {border-bottom: 1px solid #f2eeed;}
  .subhead {font-size: 15px; color: #ffffff; font-family: sans-serif; letter-spacing: 10px;}
  .h1, .h2, .bodycopy {color: #153643; font-family: sans-serif;}
  .h1 {font-size: 33px; line-height: 38px; font-weight: bold;}
  .h2 {padding: 0 0 15px 0; font-size: 24px; line-height: 28px; font-weight: bold;}
  .bodycopy {font-size: 16px; line-height: 22px;}
  .button {text-align: center; font-size: 18px; font-family: sans-serif; font-weight: bold; padding: 0 30px 0 30px;}
  .button a {color: #ffffff; text-decoration: none;}
  .footer {padding: 20px 30px 15px 30px;}
  .footercopy {font-family: sans-serif; font-size: 14px; color: #ffffff;}
  .footercopy a {color: #ffffff; text-decoration: underline;}

  @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
  body[yahoo] .hide {display: none!important;}
  body[yahoo] .buttonwrapper {background-color: transparent!important;}
  body[yahoo] .button {padding: 0px!important;}
  body[yahoo] .button a {background-color: #e05443; padding: 15px 15px 13px!important;}
  body[yahoo] .unsubscribe {display: block; margin-top: 20px; padding: 10px 50px; background: #2f3942; border-radius: 5px; text-decoration: none!important; font-weight: bold;}
  }

  /*@media only screen and (min-device-width: 601px) {
    .content {width: 600px !important;}
    .col425 {width: 425px!important;}
    .col380 {width: 380px!important;}
    }*/

  </style>
</head>

<body yahoo bgcolor="#f6f8f1">
<table width="100%" bgcolor="#f6f8f1" border="0" cellpadding="0" cellspacing="0">
<tr>
  <td>
    <!--[if (gte mso 9)|(IE)]>
      <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
        <tr>
          <td>
    <![endif]-->     
    <table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td bgcolor="#38B5AA" class="header">
          <table width="70" align="left" border="0" cellpadding="0" cellspacing="0">  
            <tr>
              <td height="70" style="padding: 0 20px 20px 0;">
                <img class="fix" src="http://medikaplaza.co.id/wp-content/uploads/2017/12/MP-Est.png" width="200" height="70" border="0" alt="" />
              </td>
            </tr>
          </table>
          <!--[if (gte mso 9)|(IE)]>
            <table width="425" align="left" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td>
          <![endif]-->
          <table class="col425" align="left" border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 285px;">  
            <tr>
              <td height="70">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="subhead" style="padding: 0 0 0 3px;">
                      MEDIKAPLAZA
                    </td>
                  </tr>
                  <tr>
                    <td class="h1" style="padding: 5px 0 0 0;">
                      TRAINING
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
          <!--[if (gte mso 9)|(IE)]>
                </td>
              </tr>
          </table>
          <![endif]-->
        </td>
      </tr>
      <tr>
        <td class="innerpadding borderbottom">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="h2">
                <center>Terima Kasih Sudah Mendaftar di Medical Training</center>
              </td>
            </tr>
            <tr>
              <td class="bodycopy">
               <div align="justify"> Akun anda berhasil di verifikasi oleh Team kami, anda dapat melakukan Ujian Pre Test Sekarang. Informasi Akun anda akan ada di bawah ini. </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td class="innerpadding borderbottom">
          <table width="115" align="left" border="0" cellpadding="0" cellspacing="0">  
            <tr>
              <td height="115" style="padding: 0 20px 20px 0;">
                <img class="fix" src="https://i0.wp.com/www.gospelofhealth.org/wp-content/uploads/2016/09/secrets-of-strength.jpg" width="115" height="115" border="0" alt="" />
              </td>
            </tr>
          </table>
          <!--[if (gte mso 9)|(IE)]>
            <table width="380" align="left" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td>
          <![endif]-->
          <table class="col380" align="left" border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 380px;">  
            <tr>
              <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="bodycopy">
                     Ini adalah informasi akun anda
                     <p>Username      : '.$username.' </p>
                     <p>Password      : '.$username.' </p>
                     <p>Nama Training : '.$c['name_training'].' </p>
                     <p>Tanggal Training : '.$c['date_training'].' </p>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 20px 0 0 0;">
                      <table class="buttonwrapper" bgcolor="#008C0C8" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td class="button" height="45">
                            <a href="https://www.medikaplaza.co.id">Claim yours!</a>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
          <!--[if (gte mso 9)|(IE)]>
                </td>
              </tr>
          </table>
          <![endif]-->
        </td>
      </tr>
      <tr>
        <td class="innerpadding borderbottom">
          <img class="fix" src="http://medikaplaza.co.id/wp-content/uploads/2017/12/MP-Est.png" width="100%" border="0" alt="" />
        </td>
      </tr>
      <tr>
        <td class="innerpadding bodycopy">
               <center> > Medika Plaza having an experience in medical services, especially in oil and gas company in Indonesia. Medika Plaza have 6 core product which called 6M product, they are Medical Center (MCU), Medical Site, Medical Evacuation, Medical Admistration service, Medical Training, Medical Hospital Management. <center>
        </td>
      </tr>
      <tr>
        <td class="footer" bgcolor="#44525f">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="center" class="footercopy">
                <center> BELTWAY OFFICE PARK,
TOWER C, 2nd Floor,
Jl. TB. Simatupang Kav. 41
Jakarta Selatan 12550 </center>
                &reg; Haris Lukman Hakim, Medikaplaza 2018<br/>
                <a href="#" class="unsubscribe"><font color="#ffffff">Unsubscribe</font></a> 
                <span class="hide">from this newsletter instantly</span>
              </td>
            </tr>
            <tr>
              <td align="center" style="padding: 20px 0 0 0;">
                <table border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="37" style="text-align: center; padding: 0 10px 0 10px;">
                      <a href="http://www.facebook.com/">
                        <img src="https://www.facebook.com/images/fb_icon_325x325.png" width="37" height="37" alt="Facebook" border="0" />
                      </a>
                    </td>
                    <td width="37" style="text-align: center; padding: 0 10px 0 10px;">
                      <a href="http://www.twitter.com/">
                        <img src="https://upload.wikimedia.org/wikipedia/de/thumb/9/9f/Twitter_bird_logo_2012.svg/154px-Twitter_bird_logo_2012.svg.png" width="37" height="37" alt="Twitter" border="0" />
                      </a>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    <!--[if (gte mso 9)|(IE)]>
          </td>
        </tr>
    </table>
    <![endif]-->
    </td>
  </tr>
</table>
</body>
</html>';
$mail->Body = $mailContent;

// Menambahakn lampiran
//$mail->addAttachment('lmp/file1.pdf');
//$mail->addAttachment('lmp/file2.png', 'nama-baru-file2.png'); //atur nama baru

if(!$mail->send()){
    echo 'Pesan tidak dapat dikirim.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}else{
    	echo "<script language='javascript'>
	alert('Data Sudah Berhasil Di Tambahkan Sebagai Peserta Training !');
	document.location='datatraining_baru.php';
	</script>";
}





	}else{
	echo "Data Belum Di Pilih";
}
}else{
echo "<script language='javascript'>
alert('Maaf anda tidak bisa mengakses !');
document.location='index.php';
</script>";
}

?>


