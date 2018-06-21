<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['level'])){
include "koneksi.php";
//hapus
if(isset($_GET['Kd_mapel'])){
	$kode=$_GET['Kd_mapel'];
	$sql="delete from mapel where Kd_mapel='$kode'";
	$query=mysqli_query($koneksi,$sql);
	header("location:datamapel.php");
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