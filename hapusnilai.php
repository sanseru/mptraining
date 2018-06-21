<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['level'])){
include "koneksi.php";
//hapus
if(isset($_GET['Id_nilai'])){
	$kode=$_GET['Id_nilai'];
	$sql="delete from tbnilai where Id_nilai='$kode'";
	$query=mysqli_query($koneksi,$sql);
	header("location:cetaknilai.php");
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