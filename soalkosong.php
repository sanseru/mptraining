<?php
include "koneksi.php";
error_reporting (0);
if ($_GET[Kd_mapel]){
$result = mysqli_query ($koneksi,"SELECT * FROM tbsoal 
  WHERE Kd_mapel='$_GET[Kd_mapel]'");
  $soalkosong=mysqli_num_rows($result);
  if (empty($soalkosong)) {
  echo "<script language='javascript'>
alert('Data Soal Kosong');
document.location='tampilmapelsoal.php';
</script>";
}
}
?>