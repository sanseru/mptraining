<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['level'])){
include "koneksi.php";
//hapus
if(isset($_GET['Nip'])){
	$kode=$_GET['Nip'];
	$sql="delete from guru where Nip='$kode'";
	$user="delete from user where username='$kode'";
	$use=mysqli_query($koneksi,$user);
	$query=mysqli_query($koneksi,$sql);
	header("location:dataguru.php");
	}else{
	echo "Data yang dihapus belum dipilih";
}
}else{
echo "<script language='javascript'>
alert('Maaf anda tidak bisa mengakses !');
document.location='index.php';
</script>";
}
?>