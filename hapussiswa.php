<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['level'])){
include "koneksi.php";
//hapus
if(isset($_GET['Nis'])){
	$kode=$_GET['Nis'];
	$sql="delete from siswa where Nis='$kode'";
	$user="delete from user where username='$kode'";
	$use=mysqli_query($koneksi,$user);
	$query=mysqli_query($koneksi,$sql);
	header("location:datasiswa.php");
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