 <?php
error_reporting(0);
include "koneksi.php";
$dua=mysqli_query($koneksi,"select Ujian_ke from tbnilai where Nis='$_POST[n]' order by Ujian_ke DESC limit 1");
$r_dua=mysqli_fetch_array($dua);
$uk=$r_dua["Ujian_ke"];
$uks=$uk+1;
$result=mysqli_query($koneksi,"SELECT Id_soal FROM tbsoal WHERE Kd_mapel='$_POST[md]'");
$benar=0;
$nomor_soal=1;
while($row=mysqli_fetch_array($result)){
      $id=$row["Id_soal"];
      $q=q.$id;
      if($_POST[$q] !=""){
         $cekcek=mysqli_query($koneksi,"SELECT * FROM tbsoal WHERE Kd_mapel ='$_POST[md]' and Id_soal='$id'");
	 $bariscek=mysqli_fetch_array($cekcek);
	 $question=$bariscek["Soal"];
	 $answer=$bariscek["Jawaban"];
	 $bariscekdua=$bariscek["Kd_mapel"];
	 $idd=$row["Id_soal"];
	 $qq=q.$idd;
	 if($_POST[$qq]== $answer){
	    $benar++;
	    $menampilkanfile="$_POST[n]"."_"."$bariscekdua"."_"."$uks";
	 }
	 }
	 }
$jumlah=mysqli_query($koneksi,"SELECT Jumlah_soal FROM mapel WHERE Kd_mapel='$_POST[md]'");
$jumlah1=mysqli_fetch_array($jumlah);
$jumlah_soal=$jumlah1["Jumlah_soal"];
$salah=$jumlah_soal-$benar;
$nilai=(100/$jumlah_soal*$benar);
$result=mysqli_query($koneksi,"SELECT * FROM siswa,mapel WHERE Nis='$_POST[n]' AND Kd_mapel='$_POST[md]'");
$row=mysqli_fetch_array($result);
$tanggal=date("Y-m-d H:i:s");

mysqli_query($koneksi,"INSERT INTO tbnilai VALUES ('','$_POST[md]','$_POST[n]','$salah','$benar','$jumlah_soal','$nilai','$tanggal','$uks','$_POST[jh]','$_POST[mh]',
'$_POST[dh]')");
echo"<script language='javascript'>
alert('Data anda sudah tersimpan ');
document.location='tampilnilai.php';
</script>";;
?>

  
