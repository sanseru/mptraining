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
	    $x="insert into user values('$nama','$username','$nmp','','siswa')";
	$query=mysqli_query($koneksi,$x);

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
$mail->addAddress('haris.lukman@medikaplaza.com');

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
$mailContent = "<h1>Mengirim Email HTML menggunakan SMTP di PHP</h1>
    <p>Ini adalah TAMBAH PSERETA '.$username.'</p>
    <p>Username anda : '.$username.'</p>
    <p> Password anda : '.$username.'";
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


