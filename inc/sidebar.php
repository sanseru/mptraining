<?php
include "koneksi.php"
?>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo$b['Nama'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->

     <?php
if($_SESSION['level'] == "admin"){
echo"
     <ul class='sidebar-menu' data-widget='tree'>
       <li class='header'>MAIN NAVIGATION</li>
       <!-- HOME BUTTON -->
       <li>
         <a href='main.php'>
           <i class='fa fa-home'></i> <span>HOME</span>
           <span class='pull-right-container'>
             <small class='label pull-right bg-green'>HOME</small>
           </span>
         </a>
       </li>
       <li class='active treeview'>
         <a href='#'>
           <i class='fa fa-tasks'></i> <span>MENU</span>
           <span class='pull-right-container'>
             <i class='fa fa-angle-left pull-right'></i>
           </span>
         </a>
         <ul class='treeview-menu'>
           <li><a href='dataguru.php'><i class='fa fa-circle-o'></i>TRAINER</a></li>
           <li><a href='datatraining_baru.php'><i class='fa fa-circle-o'></i>PESERTA</a></li>
           <li><a href='datasoal.php'><i class='fa fa-circle-o'></i>SOAL</a></li>
           <li><a href='datamapel.php'><i class='fa fa-circle-o'></i> MATA PELAJARAN</a></li>

         </ul>
       </li>

       <li>
         <a href='cetaknilai.php'>
           <i class='fa fa-print'></i> <span>Cetak Nilai</span>
           <span class='pull-right-container'>
             <small class='label pull-right bg-green'>Print</small>
           </span>
         </a>
       </li>
   </section>
   <!-- /.sidebar -->
</aside>";} 

else if($_SESSION['level'] == "guru"){
 echo"  <ul class='sidebar-menu' data-widget='tree'>
       <li class='header'>MAIN NAVIGATION</li>
       <!-- HOME BUTTON -->
       <li>
         <a href='main.php'>
           <i class='fa fa-home'></i> <span>HOME</span>
           <span class='pull-right-container'>
             <small class='label pull-right bg-green'>HOME</small>
           </span>
         </a>
       </li>

       <li>
         <a href='datamapel.php'>
           <i class='fa fa-home'></i> <span>DATA MAPEL</span>
           <span class='pull-right-container'>
             <small class='label pull-right bg-green'>OK</small>
           </span>
         </a>
       </li>

              <li>
         <a href='datasoal.php'>
           <i class='fa fa-home'></i> <span>DATA SOAL</span>
           <span class='pull-right-container'>
             <small class='label pull-right bg-green'>OK</small>
           </span>
         </a>
       </li>

        <li>
         <a href='datatraining_baru.php'>
           <i class='fa fa-home'></i> <span>DATA SISWA</span>
           <span class='pull-right-container'>
             <small class='label pull-right bg-green'>OK</small>
           </span>
         </a>
       </li>


              <li>
         <a href='tambahjadwal.php'>
           <i class='fa fa-home'></i> <span>TAMBAH JADWAL</span>
           <span class='pull-right-container'>
             <small class='label pull-right bg-green'>Jadwal</small>
           </span>
         </a>
       </li>

              <li>
         <a href='tugas.php'>
           <i class='fa fa-home'></i> <span>UPLOAD FILE</span>
           <span class='pull-right-container'>
             <small class='label pull-right bg-green'>UPLOAD</small>
           </span>
         </a>
       </li>
  

       <li>
         <a href='cetaknilai.php'>
           <i class='fa fa-print'></i> <span>Cetak Nilai</span>
           <span class='pull-right-container'>
             <small class='label pull-right bg-green'>Print</small>
           </span>
         </a>
       </li>
   </section>
   <!-- /.sidebar -->
</aside>";}else {
 echo"<ul class='sidebar-menu' data-widget='tree'>
       <li class='header'>MAIN NAVIGATION</li>
       <!-- HOME BUTTON -->
       <li>
         <a href='main.php'>
           <i class='fa fa-home'></i> <span>HOME</span>
           <span class='pull-right-container'>
             <small class='label pull-right bg-green'>HOME</small>
           </span>
         </a>
       </li>

       <li>
         <a href='tampilmapelsoal.php'>
           <i class='fa fa-pencil'></i> <span>KERJAKAN SOAL</span>
           <span class='pull-right-container'>
             <small class='label pull-right bg-green'>soal</small>
           </span>
         </a>
       </li>

       <li>
         <a href='downloadtugas.php'>
           <i class='fa fa-download'></i> <span>DOWNLOAD TUGAS</span>
           <span class='pull-right-container'>
             <small class='label pull-right bg-green'>Tugas</small>
           </span>
         </a>
       </li>
  

       <li>
         <a href='tampilnilai.php'>
           <i class='fa fa-book'></i> <span>Lihat Nilai</span>
           <span class='pull-right-container'>
             <small class='label pull-right bg-green'>view</small>
           </span>
         </a>
       </li>
   </section>
   <!-- /.sidebar -->
</aside>";}
?>
 
 


    
    </section>
    <!-- /.sidebar -->
  </aside>