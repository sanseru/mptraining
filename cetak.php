<?php
	session_start();
	if(isset($_SESSION['username'])){
	include "koneksi.php";	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cetak Nilai</title>
	<style type="text/css">
		body{font-family:Helvetica;}
	</style>
</head>
<body  onLoad="javascript:window.print()">
	<table border="0" align="center" width="100%" cellpadding="0">
		<tr bgcolor="#fff">
			<td width="100px"><img src="img/medikaplaza.png" width="100px"></td>
			<td align="center"><h5>MEDIKA PLAZA</H5><h2>MEDICAL TRAINING</h2><small>BELTWAY OFFICE PARK, TOWER C, 2nd Floor,  Jl. TB. Simatupang Kav. 41. Jakarta 12550 PHONE : +62 21 808 66 088 FAX : +62 21 808 66 089 <br>mail: marketing@medikaplaza.com</small></td>
			<td width="100px"><img src="img/medikaplaza.png" width="70px"></td>
		</tr>
		</table>
	
	<hr width="100%" align="center">
	<table align="center" width="100%" cellpadding="2" >
	<?php
		$a="select*from user_in where username='$_GET[Nis]'";
		$b=mysqli_query($koneksi,$a);
		$c=mysqli_fetch_array($b);
		

	?>
		<tr>
			<td>Nama Siswa</td>
			<td> :&nbsp;&nbsp;<b> <?php echo $c['nama'];?></b></td>
			<td>Email</td>
			<td> :&nbsp;&nbsp;<b> <?php echo $c['email'];?></b></td>
		</tr>
		<tr>
			<td>Posisi</td>
			<td> :&nbsp;&nbsp;<b> <?php echo $c['position'];?></b></td>
			<td>Nomor HP</td>
			<td> :&nbsp;&nbsp;<b> <?php echo $c['phone'];?></b></td>
		</tr>
		<tr>
			<td>Perusahaan</td>
			<td> :&nbsp;&nbsp;<b> <?php echo $c['company'];?></b></td>
		</tr>
	</table>
	<br>
	

<!-- Tabel tampil data -->	
	<table style="border-collapse:collapse;" align="center" width="100%" border="1" cellpadding="2">
		<tr height="30px">
			<th width="5%">No</th> 
			<th width="15%">Nama Mapel</th> 
			<th width="5%">Salah</th>
			<th width="5%">Benar</th>
			<th width="15%">Nilai</th>
			<th width="15%">Tanggal</th>
			<th width="15%">Waktu</th>
			<th width="15%">Ujian Ke</th>
			
			

		</tr>
	<?php
	$a="select * from tbnilai,mapel,user_in where mapel.Kd_mapel=tbnilai.Kd_mapel AND user_in.username=tbnilai.Nis AND tbnilai.Nis='$_GET[Nis]'";
	$b=mysqli_query($koneksi,$a);
	$no=1;
	while($c=mysqli_fetch_array($b)){
	?>

<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $c['Nama_mapel'];?></td>
								<td><?php echo $c['Salah'];?></td>
								<td><?php echo $c['Benar'];?></td>
								<td><?php echo $c['Nilai'];?></td>
								<td><?php echo $c['Tanggal'];?></td>
								<td><?php echo $c['Jam'];?> : <?php echo $c['Menit'];?> : <?php echo $c['Detik'];?></td>
								<td><?php echo $c['Ujian_ke'];?></td>
								
								
</tr>
	  <?php $no++; } ?>

	</table>
<!-- Tanda penerima -->
	<table align="center" width="100%" cellpadding="2">
		<tr>
			<br>
			<td align="center"><br>Trainer,
			<br><br><br><br>
			<?php
				$j=mysqli_query($koneksi,"select*from user where username='".$_SESSION['username']."'");
				$k=mysqli_fetch_array($j);
				echo $k['Nama'];
			?>
			</td>
			<td width="20%"></td>
			<td align="center">
				<?php 
	$array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');
	$hari = $array_hari[date('N')];

	$array_bulan = array(1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Novemer','Desember');
	$bulan = $array_bulan[date('n')];

	$tgl = date('j');
	$thn = date('Y');

	echo $hari.", ".$tgl." ".$bulan." ".$thn ;
?>
<br>
<br><br><br><br><br><br><br></td>
		</tr>
	</table>
</body>
</html>
<?php
	}else{
		echo "<script language='javascript'>alert('Tidak ada data yang dicetak');
		document.location='home.php';</script>";
	}
?>