<?php
include "koneksi.php";
include "inc/head.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>MedikaPlaza Training</title>
   <!-- Bootstrap -->
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link href="css/responsive-slider.css" rel="stylesheet">
   <link rel="stylesheet" href="css/animate.css">
   <link rel="stylesheet" href="css/font-awesome.min.css">
   <link href="css/style.css" rel="stylesheet">
   <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
   <![endif]-->

   <style>
   .color-palette {
      height: 35px;
      line-height: 35px;
   }
</style>
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
                           <li role="presentation" class="active"><a href="schedule">Schedule</a></li>
                           <li role="presentation"><a href="registration">Registration</a></li>
                           <li role="presentation"><a href="contacts">Contact</a></li>
                           <li role="presentation"><a href="login">Login</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </nav>
         </div>
      </div>
   </header>
   <div class="container">
      <div class="row">
         <!-- /.box-header -->
         <div class="box-body">
            <div class="col-lg-2"></div>
            <div class="col-lg-4">
               <table id="example1" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th width="5%">FIRST AID BASIC</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $a="select * from jadwal where mapel='IP024'";
                     
                     $b=mysqli_query($koneksi,$a);    
                     
                     while($c=mysqli_fetch_array($b)){
                        ?>
                        <tr>
                           <td><?php echo $c['jadwal'];?></td>
                        <?php  } ?>                         
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="col-lg-4">
               <table id="example1" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th width="10%">FIRST AID INTERMEDIET</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $a="select * from jadwal where mapel='Pilih Matkul'";
                     
                     $b=mysqli_query($koneksi,$a);    
                     
                     while($c=mysqli_fetch_array($b)){
                        ?>
                        <tr>
                           <td><?php echo $c['jadwal'];?></td>
                        <?php  } ?>                         
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="row">
         <hr>
      </div>
   </div>


   <div class="container">
    <div class="row">

       <div class="col-sm-4 color-palette" style="background-color:#0080C8;"></div>
       <div class="col-sm-4 color-palette" style="background-color:#004F7B;"></div>
       <div class="col-sm-4 color-palette" style="background-color:#38B5AA;"></div>



    </div>
 </div>
 <!--start footer-->
 <footer>
   <div class="container">
      <div class="row">
         <div class="col-lg-3">
            <div class="widget">
               <!-- <h5 class="widgetheading">Get in touch with us</h5>-->
               <address>
                  <strong>HEAD OFFICE</strong>
                  <br> BELTWAY OFFICE PARK, TOWER C, 2nd Floor,
                  <br> Jl. TB. Simatupang Kav. 41. Jakarta 12550
               </address>
               <i>PHONE:</i>+62 21 808 66 088
               <br>
               <i>Mail:</i> marketing@medikaplaza.com
            </div>
         </div>
         <div class="col-lg-3">
            <div class="widget">
               <address>
                  <strong>MP - BELTWAY CLINIC
                  </strong>
                  <br> BELTWAY OFFICE PARK, ANNEX BUILDING,
                  <br> Ground Floor, Jl. TB. Simatupang Kav. 41.
                  <br> Jakarta 12550
               </address>
               <i>PHONE:</i>+62 021 808 66 099
               <br>
               <i>FAX:</i> +62 21 808 66 098
            </div>
         </div>
         <div class="col-lg-3">
            <div class="widget">
               <address>
                  <strong>MP - WTC 2 CLINIC</strong>
                  <br> World Trade Center 2, Lower Ground Floor,
                  <br> Jl. Jend. Sudirman, Kav. 29 Jakarta 12920
               </address>
               <i>PHONE</i>+62 21 295 22 611
               <br>
               <i>FAX</i> +62 21 295 22 610
            </div>
         </div>
         <div class="col-lg-3">
            <div class="widget">
              <strong style="color:red; font-size:20px;" >24/7 HELP LINE</strong>

              <h4><b style="color:red;" > <i class="fa fa-phone"></i> 1500 918</h4>
               <h4><b style="color:red;">+62 21 8086 6000 </b></h4>
            </div>
            <div class="clear">
            </div>
         </div>
      </div>
   </div>
</div>
<div class="container">
   <div class="row">
      <hr>
   </div>
</div>
<div id="sub-footer">
   <div class="container">
      <div class="row">
         <div class="col-lg-6">
            <div class="copyright">
               <p>
                 <span>&copy; Haris Lukman Hakim 2018. By </span><a href="http://medikaplaza.com" target="_blank">MedikaPlaza</a>
              </p>
      <!-- 
         All links in the footer should remain intact. 
         Licenseing information is available at: http://bootstraptaste.com/license/
         You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Arsha
      -->
   </div>
</div>
<div class="col-lg-6">
   <ul class="social-network">
      <li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook fa-1x"></i></a></li>
      <li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter fa-1x"></i></a></li>
      <li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin fa-1x"></i></a></li>
      <li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest fa-1x"></i></a></li>
      <li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus fa-1x"></i></a></li>
   </ul>
</div>
</div>
</div>
</div>
</footer>
<!--end footer-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/responsive-slider.js"></script>
<script src="js/wow.min.js"></script>
<script>
   wow = new WOW({
      
   })
   .init();
</script>
</body>
</html>