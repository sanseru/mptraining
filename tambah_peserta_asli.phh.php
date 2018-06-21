<?php
session_start();
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
	echo "<script language='javascript'>
	alert('Data Sudah Berhasil Di Tambahkan Sebagai Peserta Training !');
	document.location='datatraining_baru.php';
	</script>";
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