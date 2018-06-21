<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['level'])){
include "inc/header.php";
include "inc/sidebar.php";
include "inc/footer.php";
?>
<section id="content"> 
<section class="vbox"> 
<section class="scrollable padder"> 
<div class="m-b-md"> 
<h3 class="m-b-none">SMAN 7 Mataram</h3><small>Mendidik Untuk Maju</small> </div> 
<div class="col-sm-8"> 
<section class="panel panel-default"> 
<header class="panel-heading font-bold">Ubah Password</header> 
<div class="panel-body"> 
<?php
include "koneksi.php";

	if(isset($_POST['ubah'])){
	$passlama = $_POST['passlama'];
	$passbaru = $_POST['passbaru'];
	$konfpassbaru = $_POST['konfpassbaru'];
	
	// mengambil isi record tabel user
	$sql_ubah = "SELECT * FROM user WHERE Username='$_SESSION[username]'";
	$query_ubah = mysqli_query($koneksi,$sql_ubah) or die (mysql_error());
	$eks_qr_ubah = mysqli_fetch_array($query_ubah);
	 
	// cek kesesuaian password
	$passenkripsi=md5($passlama);
		if ($passenkripsi == $eks_qr_ubah['Password']){
			if($passbaru==$konfpassbaru)
			{
			$enkripsipassbaru=md5($passbaru);
			$sql_update="UPDATE user SET Password='$enkripsipassbaru' WHERE username='$_SESSION[username]'";
			$qry_update=mysqli_query($koneksi,$sql_update);
				if($qry_update)
				{
				echo "<script language='javascript'>alert('Ubah Password Berhasil !');window.location='login.php'</script>";
				}else
				{
				echo "<script language='javascript'>alert('Ubah Password Gagal !');</script>";
				}
			}else
			{
			echo "<script language='javascript'>alert('Password baru dengan konfirmasi password baru tidak cocok!');</script>";
			}
		}else
		{
		echo "<script language='javascript'>alert('Password lama anda salah!');</script>";
		}
	}
?>
<form class="bs-example form-horizontal" action="" method="post" enctype="multipart/form-data"> 
<div class="form-group"> 
<label class="col-lg-2 control-label">Password Lama</label> <div class="col-lg-10"> <input type="password" name="passlama" class="form-control" placeholder="Masukkan Password Lama"> </div> </div> 
<div class="form-group"> 
<label class="col-lg-2 control-label">Password Baru</label> <div class="col-lg-10"> <input type="password" name="passbaru" class="form-control" placeholder="Masukkan Password Baru" id="pwd"> </div> </div>
<div class="form-group">
<label class="col-lg-2 control-label">Konfirmasi Password</label> <div class="col-lg-10"> <input type="password" name="konfpassbaru" class="form-control" placeholder="Konfirmasi Password Baru" data-equalto="#pwd" data-required="true"> </div> </div> 

<br>
<a href="beranda.php"><input type="button" class="btn btn-default" value="Cancel"></input></a> 
<button type="submit" name="ubah" class="btn btn-primary">Edit</button>

</form> 
</div> </section> </div>
</section> 
</section> 
</section>
<script src="js/app.v2.js"></script> <!-- Bootstrap --> <!-- App --> 
<script src="js/charts/easypiechart/jquery.easy-pie-chart.js" cache="false"></script> <script src="js/charts/sparkline/jquery.sparkline.min.js" cache="false"></script> <script src="js/charts/flot/jquery.flot.min.js" cache="false"></script> 
<script src="js/charts/flot/jquery.flot.tooltip.min.js" cache="false"></script> 
<script src="js/charts/flot/jquery.flot.resize.js" cache="false"></script> 
<script src="js/charts/flot/jquery.flot.grow.js" cache="false"></script> 
<script src="js/charts/flot/demo.js" cache="false"></script> 
<script src="js/calendar/bootstrap_calendar.js" cache="false"></script> 
<script src="js/calendar/demo.js" cache="false"></script> 
<script src="js/sortable/jquery.sortable.js" cache="false"></script>
<script src="js/fuelux/fuelux.js" cache="false"></script><!-- datepicker --><script src="js/datepicker/bootstrap-datepicker.js" cache="false"></script><!-- slider --><script src="js/slider/bootstrap-slider.js" cache="false"></script><!-- file input --> <script src="js/file-input/bootstrap-filestyle.min.js" cache="false"></script><!-- combodate --><script src="js/libs/moment.min.js" cache="false"></script><script src="js/combodate/combodate.js" cache="false"></script><!-- select2 --><script src="js/select2/select2.min.js" cache="false"></script><!-- wysiwyg --><script src="js/wysiwyg/jquery.hotkeys.js" cache="false"></script><script src="js/wysiwyg/bootstrap-wysiwyg.js" cache="false"></script><script src="js/wysiwyg/demo.js" cache="false"></script><!-- markdown --><script src="js/markdown/epiceditor.min.js" cache="false"></script><script src="js/markdown/demo.js" cache="false"></script>
</body>
</html>

<?php
}else{
echo "<script language='javascript'>
alert('maaf anda tidak bisa mengakses, mohon login dulu!');
document.location='index.php';
</script>";
}
?>