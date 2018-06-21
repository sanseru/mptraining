<?php
include "koneksi.php";
?>
<?php
if($_SESSION['level'] == "admin"){
echo"<section> 
<section class='hbox stretch'> <!-- .aside --> 
<aside class='bg-dark lter aside-md hidden-print' id='nav'> 
<section class='vbox'> 
<section class='w-f scrollable'> 
<div class='slim-scroll' data-height='auto' data-disable-fade-out='true' data-distance='0' data-size='5px' data-color='#333333'> <!-- nav --> 
<nav class='nav-primary hidden-xs'> 
<ul class='nav'> 
<li class='active'> 
<a href='beranda.php' class='active'> 
<i class='fa fa-home'> 
<b class='bg-danger'>
</b> 
</i> 
<span>Home</span> 
</a> 
</li>
 <li >
 <a href='#data'> 
 <i class='fa fa-list-ul'> 
 <b class='bg-warning'>
 </b> 
 </i> 
 <span class='pull-right'> 
 <i class='fa fa-angle-down text'>
 </i> 
 <i class='fa fa-angle-up text-active'>
 </i> 
 </span> 
 <span>Data</span> 
 </a> 
 <ul class='nav lt'> 
 
 <li> 
 <a href='dataguru.php'>
 <i class='fa fa-angle-right'></i> 
 <span>Guru</span>
 </a> 
 </li>
 
 <li> 
 <a href='datasiswa.php' class='active' > 
 <i class='fa fa-angle-right'></i> 
 <span>Siswa</span> 
 </a> 
 </li> 
 
 <li> 
 <a href='datasoal.php' class='active' > 
 <i class='fa fa-angle-right'></i> 
 <span>Soal</span> 
 </a> 
 </li> 

 
 <li> 
 <a href='datamapel.php' class='active' > 
 <i class='fa fa-angle-right'></i> 
 <span>Mapel</span> 
 </a> 
 </li> 
 </li>
 
 </ul>
 
  
 
 <li >
 <a href='cetaknilai.php' > 
 <i class='fa fa-print'> 
 <b class='bg-primary dker'>
 </b> 
 </i> 
 <span>Cetak Nilai</span> 
 </a> 
 </li>
 

 </ul> 
 </nav>
 <!-- / nav --> 
 </div> 
 </section>";
 } else if($_SESSION['level'] == "guru"){
 echo" 
 <section> 
<section class='hbox stretch'> <!-- .aside --> 
<aside class='bg-dark lter aside-md hidden-print' id='nav'> 
<section class='vbox'> 
<section class='w-f scrollable'> 
<div class='slim-scroll' data-height='auto' data-disable-fade-out='true' data-distance='0' data-size='5px' data-color='#333333'> <!-- nav --> 
<nav class='nav-primary hidden-xs'> 
<ul class='nav'> 
<li class='active'> 
<a href='beranda.php' class='active'> 
<i class='fa fa-home'> 
<b class='bg-danger'>
</b> 
</i> 
<span>Home</span> 
</a> 
</li>

<li >
 <a href='datamapel.php' > 
 <i class='fa fa-print'> 
 <b class='bg-primary dker'>
 </b> 
 </i> 
 <span>Data Mapel</span> 
 </a> 
 </li>

 <li > <a href='datasoal.php' > 
 <i class='fa fa-pencil-square '> <b class='bg-primary dker'></b> </i> 
 <span>Data Soal</span> </a> </li> 
 
 <li > <a href='tugas.php' > <i class='fa fa-upload'> <b class='bg-info'></b> </i> 
 <span>Upload Tugas</span>
 </a> 
 </li>
 
 
 
 <li >
 <a href='cetaknilai.php' > 
 <i class='fa fa-print'> 
 <b class='bg-warning'>
 </b> 
 </i> 
 <span>Cetak Nilai</span> 
 </a> 
 </li>
 
 
 </ul> 
 </nav>
 <!-- / nav --> 
 </div> 
 </section> ";
 } else {
 echo"
 <section> 
<section class='hbox stretch'> <!-- .aside --> 
<aside class='bg-dark lter aside-md hidden-print' id='nav'> 
<section class='vbox'> 
<section class='w-f scrollable'> 
<div class='slim-scroll' data-height='auto' data-disable-fade-out='true' data-distance='0' data-size='5px' data-color='#333333'> <!-- nav --> 
<nav class='nav-primary hidden-xs'> 
<ul class='nav'> 
<li class='active'> 
<a href='beranda.php' class='active'> 
<i class='fa fa-home'> 
<b class='bg-danger'>
</b> 
</i> 
<span>Home</span> 
</a> 
</li>
 

 <li > <a href='tampilmapelsoal.php' > <i class='fa fa-pencil icon'> <b class='bg-info'></b> </i> 
 <span>Kerjakan Soal</span>
 </a> 
 </li>
 
 <li > <a href='downloadtugas.php' > 
 <i class='fa fa-download '> <b class='bg-primary dker'></b> </i> 
 <span>Download Tugas</span> </a> </li>
 
 
 <li >
 <a href='tampilnilai.php' > 
 <i class='fa fa-book'> 
 <b class='bg-warning'>
 </b> 
 </i> 
 <span>Lihat Nilai</span> 
 </a> 
 </li>
 
 </ul> 
 </nav>
 <!-- / nav --> 
 </div> 
 </section> ";
 }
 ?>