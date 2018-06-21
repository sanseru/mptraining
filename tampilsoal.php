<?php 
include"koneksi.php";
session_start(); 
if(isset($_SESSION['username']) && isset($_SESSION['level'])){
error_reporting(0);


?>


<html>
<head>

<script language='JavaScript' type='text/JavaScript'>
var tenth='';function ninth() {
if (document.all) {(tenth);alert("Tidak diperbolehkan Klik kanan"); return false;}}
function twelfth(e) {
if (document.layers||(document.getElementById&&!document.all)) {
if (e.which==2||e.which==3) {(tenth);return false;}}}
if (document.layers) {document.captureEvents(Event.MOUSEDOWN);document.onmousedown=twelfth;}
else{document.onmouseup=twelfth;document.oncontextmenu=ninth;}
document.oncontextmenu=new Function('alert("Tidak diperbolehkan Klik kanan"); return false')
</script>

<?php 
//periksa berapa kali boleh ujian
$tiga=mysqli_query($koneksi,"SELECT Ulang,Jam,Menit,Detik from mapel 
where Kd_mapel='$_GET[Kd_mapel]'");
$lime=mysqli_query($koneksi,"select * from tbnilai,mapel,siswa where mapel.Kd_mapel=tbnilai.Kd_mapel AND siswa.Nis=tbnilai.Nis AND tbnilai.Nis='$_SESSION[username]'ORDER BY ujian_ke DESC LIMIT 1");
$rt=mysqli_fetch_array($tiga);
$rs=mysqli_fetch_array($lime);
$max=$rt["Ulang"];
$menit=$rt["Menit"];
$jam=$rt["Jam"];
$detik=$rt["Detik"];
$test=$rs["Ujian_ke"];
$test2=$rs["Ulang"];
//echo  "$test2";
//echo "$test";
if ($test >= "1"){
	echo "<script language='javascript'>
alert('maaf anda tidak bisa mengakses, Karena Sudah Mengerjakan Ujian Ini!');
document.location='tampilmapelsoal.php';
</script>";
}else{
echo"
<script language=\"Javascript\"><!--
        var j = $jam
		var m = $menit
		var x = $detik
		var jh = 0
		var mh = 0
		var xh = 0
        var y = 1
		
        function startClock(){
        xh=xh+y
		x = x-y
		
        document.form1.detik.value =x
		document.form1.menit.value =m
		document.form1.jam.value =j
		document.form1.dh.value =xh
		document.form1.mh.value =mh
		document.form1.jh.value =jh
        setTimeout(\"startClock()\", 1000)
        		if(j==0){
				if(m==0){
				if(x==0){
				document.form1.submit.click();
				}		  	 	
		   	}else{
				if(x==0){
					m=m-y
					x=$detik
				}	
			}		   
		 }else{
		   if(m==0){
		   		j=j-y
		   		m=$menit
		   		x=$detik
		   }else{
		    if(x==0){
				m=m-y
					x=$detik
			}
		   }
		 }
		 
		 if(xh==60){
					if(mh<60){
						mh=mh+yh
						x=0
					}else{
						jh=jh+1
						mh=0
						xh=0
					}
				
				}	 
		 }	
	</script>";
}
?>
<title>Ujian online</title>
<link rel="stylesheet" href="soal/app.v2.css" type="text/css" /> 
<link rel="stylesheet" href="soal/style.css" type="text/css" /> 
<link rel="stylesheet" href="soal/font.css" type="text/css" cache="false" /> 
<link type="text/css" rel="stylesheet" href="soal/style.css">

        <style>
    .color-palette {
      height: 28px;
      line-height: 28px;
      width: 100%
          }
  </style>
</head>
	<body onLoad="startClock()" >


		<table border="0" align="center" width="100%" cellpadding="0">
		<tr bgcolor="#fff">
			<td width="100px"><img  src="images/logofinal2016-311x107a.gif" width="100px"></td>
			<td align="center"><h2 >MEDIKAPLAZA</H2><h1>Training Center</h1><small>BELTWAY OFFICE PARK, TOWER C, 2nd Floor, 
Jl. TB. Simatupang Kav. 41. Jakarta 12550</small></td>
			<td width="100px"><img src="images/mplogonew700-700x467-22.png" width="100px"></td>
		</tr>
		</table>
			<div class="row">
	<div class="col-sm-4 color-palette"  style="background-color:#0080C8;"></div>
        <div class="col-sm-4 color-palette" style="background-color:#004F7B;"></div>
        <div class="col-sm-4 color-palette" style="background-color:#38B5AA;"></div>
	</div>

<div class="apa">
		<form name="form1" method="post" align="center" action="prosessoal.php" onsubmit="return confirm('Apakah anda yakin selesai menjawab pertanyaan anda? ');">
			<table width="100%" border="0"  cellpadding="2" cellspacing="1" >
  <tr>
  	<?php
  	$result=mysqli_query($koneksi,"SELECT * FROM mapel ORDER RAND()  WHERE 
	Kd_mapel='$_GET[Kd_mapel]'");
  	$baris=mysqli_fetch_array($result);
  	?>
  	<td colspan="4">
		<div align="center" class="header style5">
		SOAL <?php echo"$_GET[Id_mapel]"; ?>
		</div>
  	</td>
  </tr>
  <tr>
    <td colspan="4">
		<div align="center"><?php echo"$baris[Nama_mapel]";?>
		<br>
		</div>
	</td>
  </tr>
  <tr>
    <td colspan="4">
			<input type="hidden" name="md" value="<?php echo"$_GET[Kd_mapel]"; ?>">
			<input type="hidden" name="n" value="<?php echo"$_SESSION[username]";?>">	
	</td>
  </tr>
  <tr>
			<td colspan="4">&nbsp;</td>
  </tr>
  <tr>
		<td colspan="4">

			Waktu 
			<input name="jam" type="text" id="jam" size="2" readonly="true">
			&nbsp;Jam &nbsp;
			<input name="menit" type="text" id="menit" size="2" readonly="true">
			&nbsp;Menit 
			<input name="detik" type="text" id="detik" size="2" readonly="true"> 
			Detik 
			<input name="jh" type="hidden" id="jh">
			<input name="mh" type="hidden" id="mh">
			<input name="dh" type="hidden" id="dh"><br><br>
		</td>
 </tr>
  
  <?php 
  $banyaksoal=mysqli_query($koneksi,"SELECT Jumlah_soal FROM mapel WHERE 
  Kd_mapel='$_GET[Kd_mapel]'");
  $banyaksoal1=mysqli_fetch_array($banyaksoal);
  $jmlh_soal=$banyaksoal1["Jumlah_soal"];
  $result = mysqli_query ($koneksi,"SELECT * FROM tbsoal 
  WHERE Kd_mapel='$_GET[Kd_mapel]' ORDER BY RAND() LIMIT $jmlh_soal");
  $soalkosong=mysqli_num_rows($result);
  if (empty($soalkosong)) {
 header("location:soalkosong.php?Kd_mapel=$_GET[Kd_mapel]");
}
  while (($row=mysqli_fetch_array($result)) and ($num<=50)) {
  	$id_soal = $row["Id_soal"]; 
	$kd_mapel=$row["Kd_mapel"];
	$soal= $row["Soal"]; 
	$jawaban=$row["Jawaban"];
	$pilihan1=$row["Pilihan1"];
	$pilihan2=$row["Pilihan2"];
	$pilihan3=$row["Pilihan3"];
	$input=array($pilihan1,$pilihan2,$pilihan3,$jawaban);
	sort($input, SORT_STRING);
	srand ((float)microtime()*1000000);
	shuffle($input);
	 
 ?>
<tr >
	<td width="4%" height="30"> 
			<?php $num++; echo"$num"; ?>
			<input name="nomor" type="hidden" id="nomor" value="<?php  echo"$num";?>">	
	</td>
	<td height="30" colspan="3">
			<?php echo"$soal";?>	
	</td>
</tr>
		<?php for ($j = 0; $j < 4; $j++){ $a=$input[$j];?>
<tr>
			<td height="30" >	</td>
    <td width="2%" height="30" >
			<input name="<?php echo"q$id_soal"; ?>" type="radio" value="<?php echo $a;?>">
	</td>
    <td width="84%" height="30">
			<?php echo $a;?>	
	</td>
			<td width="10%">	</td>
</tr>
		<?php } ?>  
<tr >
			<td height="30" >	</td>
    <td height="30" >
		<input name="<?php echo"q$id_soal"; ?>" type="radio"  value="Tidak Menjawab" checked >
	</td>
    <td height="30" >
		Tidak Menjawab	
	</td>
		<td height="30" >	</td>
</tr>
<tr>
     <td height="16" colspan="2" ></td>
     <td height="16" colspan="2" >&nbsp;</td>
</tr>
		<?php }?>
<tr>
    <td height="10" colspan="2" >	</td>
    <td height="10" colspan="2" >
			<a href="tampilmapelsoal.php"><input type="button" class="btn btn-default" value="Cancel"></input></a> 
			<button type="submit" name="submit" class="btn btn-primary">Selesai</button>
	</td>
</tr>  
</table>
</form> 
		<? }} ?>
</div>
	</body>
</html>


<script src="soal/app.v2.js"></script> 
	
<?php
	}else{
echo "<script language='javascript'>
alert('maaf anda tidak bisa mengakses, mohon login dulu!');
document.location='index.php';
</script>";
}
 ?>