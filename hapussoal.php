<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['level'])){
include "koneksi.php";
//hapus
if(isset($_GET['Id_soal'])){
	$kode=$_GET['Id_soal'];
	$sql="delete from tbsoal where Id_soal='$kode'";
	$query=mysqli_query($koneksi,$sql);
	header("location:datasoal.php");
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