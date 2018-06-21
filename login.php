<?php
   session_start();
   include "koneksi.php";

	?>
<!DOCTYPE html>
<html lang="en" class="bg-white">
   <head>
      <meta charset="utf-8" />
       <link rel="shortcut icon" href="https://www.medikaplaza.com/assets/images/smalllogo-237x104-42.png" type="image/x-icon">
      <title>MedikaPlaza</title>
      <meta name="description" content="app, web app, responsive, admin dashboard,admin, flat, flat ui, ui kit, off screen nav" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
      <link rel="stylesheet" href="css/app.v2.css" type="text/css" />
	  <link rel="stylesheet" href="css/font.css" type="text/css" cache="false" />
	  <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/responsive-slider.css" rel="stylesheet">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link href="css/style.css" rel="stylesheet">	

      <!--[if lt IE 9]> <script src="js/ie/html5shiv.js" cache="false"></script> 
      <script src="js/ie/respond.min.js" cache="false"></script>
      <script src="js/ie/excanvas.js" cache="false"></script> <![endif]-->
   </head>
   <body>
   <header>
		<div class="container">
			<div class="row">
				<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
						<div class="navbar-header">
								 <a href="index.html">
                <img src="img/MPlogo.jpg" alt="" style="height:85px;" ></a>
						
						</div>

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</button>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<div class="menu">
							<ul class="nav nav-tabs" role="tablist">
								 <li role="presentation" ><a href="index">Home</a></li>
                                <li role="presentation"><a href="schedule">Schedule</a></li>
                                <li role="presentation"><a href="registration">Registration</a></li>
                                <li role="presentation" ><a href="contacts">Contact</a></li>
                                <li role="presentation" class="active"><a href="login">Login</a></li>                  
							</ul>
						</div>
          </div>
					</div>			
				</nav>
			</div>
		</div>
	</header>


      <section id="content" class="container">
         <div class="container">
		 <div class="row">
		  <div class="col-xs-12 col-sm-4 col-md-4">&nbsp;</div>
		  <div class="col-xs-12 col-sm-4 col-md-4">
          <section class="panel panel-default bg-white m-t-lg">
               <header class="panel-heading text-center">
                  <h3> <strong>Sign in</strong> </h3>
               </header>
               <form method="POST" action="" class="panel-body wrapper-lg">
                  <div class="form-group"> 
                     <?php
                        if(isset($_POST['login'])){
                        $username=$_POST['username'];
                        $password=md5($_POST['password']);
                        	if(empty($username) || empty($password)){
                        	echo "<script language='javascript'>
                        		alert('Username atau Password anda belum diisi');
                        		</script>";
                        	}else{
                        	$a="select * from user where Username='$username'";
                        	$b=mysqli_query($koneksi,$a);
                        	$c=mysqli_fetch_array($b);
                        		if($username<>$c['Username']){
                        		echo "<script language='javascript'>
                        		alert('Username anda salah');
                        		</script>";
                        		}elseif($password<>$c['Password']){
                        		echo "<script language='javascript'>
                        		alert('Password anda salah');
                        		</script>";
                        		}else{
                        		$_SESSION['username']=$c['Username'];
                        		$_SESSION['level']=$c['Level'];
                            $_SESSION['mapel']=$c['mapel'];
                        		header("location:main.php");
                        		}
                        	}
                        }
                        ?>
                     <label class="control-label">Username</label> 
                     <input type="text" name="username" id="inputusername" placeholder="Username" class="form-control input-lg" autofocus> 
                  </div>
                  <div class="form-group"> <label class="control-label">Password</label> 
                     <input type="password" id="inputPassword" name="password" placeholder="Password" class="form-control input-lg"> 
                  </div>
                  <button type="submit" name="login" class="btn btn-primary"><i class="fa fa-sign-in"></i> Sign in</button>
               </form>
           <!-- </section>-->
         </div>
      </section>
      <!-- footer --> 
      <!--<footer id="footer">
         <div class="text-center padder">
            <p> <small> &copy; 2018 Haris Lukman Hakim. </small>
            </p>
         </div>
      </footer>-->
      <!-- / footer -->
      <script src="js/app.v2.js"></script> 
      <!-- Bootstrap --> <!-- App --> 
   </body>

   <style>
    .color-palette {
      height: 25px;
      line-height: 25px;
          }
  </style>

</br>
</br>
    <div class="container">
        <div class="row">

        <div class="col-sm-4 color-palette" style="background-color:#0080C8;"></div>
        <div class="col-sm-4 color-palette" style="background-color:#004F7B;"></div>
        <div class="col-sm-4 color-palette" style="background-color:#38B5AA;"></div>



    </div>
</div>


</br>
</br>

            <div class="text-center padder">
             <span>&copy; Haris Lukman Hakim 2018. By </span><a href="http://medikaplaza.com" target="_blank">MedikaPlaza</a>
            </p>
         </div>
</html>