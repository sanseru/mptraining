<?php
include "koneksi.php";
?>
<!DOCTYPE html><html lang="en" class="app">
<head> 
<meta charset="utf-8" /> 
<title>Ujian Online</title> 
<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" /> 
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
<link rel="stylesheet" href="css/app.v2.css" type="text/css" /> 
<link rel="stylesheet" href="css/styles.css" type="text/css" /> 
<link rel="stylesheet" href="css/font.css" type="text/css" cache="false" /> 
<link rel="stylesheet" href="js/calendar/bootstrap_calendar.css" type="text/css" cache="false" /> 
<link rel="stylesheet" href="js/datepicker/datepicker.css" type="text/css" cache="false" />
<link rel="stylesheet" href="js/select2/select2.css" type="text/css" cache="false" />
<link rel="stylesheet" href="js/select2/theme.css" type="text/css" cache="false" />
<link rel="stylesheet" href="js/fuelux/fuelux.css" type="text/css" cache="false" />
<link rel="stylesheet" href="js/datepicker/datepicker.css" type="text/css" cache="false" />
<link rel="stylesheet" href="js/slider/slider.css" type="text/css" cache="false" /> 
<link rel="stylesheet" href="js/datatables/datatables.css" type="text/css" cache="false"/> 
<!--[if lt IE 9]> <script src="js/ie/html5shiv.js" cache="false"></script> <script src="js/ie/respond.min.js" cache="false"></script> <script src="js/ie/excanvas.js" cache="false"></script> <![endif]-->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

</head>
<body> 
<section class="vbox"> 
<header class="bg-dark dk header navbar navbar-fixed-top-xs"> 
<a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav"> <i class="fa fa-bars"></i> </a> 
<a href="#" class="navbar-brand" data-toggle="fullscreen">
<img src="images/20.png" class="m-r-sm">Ujian Online
</a>
<ul class="nav navbar-nav navbar-right hidden-xs nav-user"> 

 <li class="dropdown hidden-xs"> 
 <a href="#" class="dropdown-toggle dker" data-toggle="dropdown">
 <i class="fa fa-fw fa-search">
 </i>
 </a> 
 <section class="dropdown-menu aside-xl animated fadeInUp"> 
 <section class="panel bg-white"> <form role="search"> 
 <div class="form-group wrapper m-b-none"> 
 <div class="input-group"> 
 <input type="text" class="form-control" placeholder="Search"> 
 <span class="input-group-btn"> <button type="submit" class="btn btn-info btn-icon">
 <i class="fa fa-search">
 </i>
 </button> 
 </span> 
 </div> 
 </div> 
 </form> 
 </section> 
 </section> 
 </li> 
 <li class="dropdown"> 
 <?php
									if(isset($_SESSION['username'])){
									$a=mysqli_query($koneksi,"SELECT * FROM user WHERE username='$_SESSION[username]'");
									$b=mysqli_fetch_array($a);
									$foto=$b['Foto'];
									}
								?>
 <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
 <span class="thumb-sm avatar pull-left"> 
 <img src="images/<?php if (empty($b['Foto'])){
	echo "avatar1.jpg";
 }else{
	echo $foto;
 } ?>" alt=""/>
 </span>
 <?php echo $b['Nama'];?>&nbsp;&nbsp;<b class="caret">
 </b> 
 </a>
 <ul class="dropdown-menu animated fadeInRight"> 
 <span class="arrow top"></span> 
 <li> <a href="ubahpassword.php">Ubah Password</a> </li> 
 <li class="divider"></li> 
 <li> 
 <a href="login.php"  >Logout
 </a>
 </li> 
 </ul> 
 </li> 
 </ul> 
 </header> 
 