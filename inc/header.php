<?php
include "koneksi.php";
if (!isset($_SESSION['username'])){
header("Location:./login.php");
}
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Medika</b>Plaza</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>MP</b>Training</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <?php
                  if(isset($_SESSION['username'])){
                  $a=mysqli_query($koneksi,"SELECT * FROM user WHERE username='$_SESSION[username]'");
                  $b=mysqli_fetch_array($a);
                  $foto=$b['Foto'];
                  $lvluser=$b['Level'];
                  }
                ?>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo$b['Nama'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                 <?php echo$b['Nama'];?>
                 <small > Level User<b style="color:Tomato;"> <?php echo$b['Level'];?></b></small>
                </p>
              </li>
    

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="ubahpassword.php" class="btn btn-default btn-flat">UbahPassword</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>