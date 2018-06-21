<?php  
// Fungsi untuk mengecek username

// koneksi ke mysql
mysql_connect('localhost', 'root', '');

// koneksi ke database
mysql_select_db('dbujian');

// mendapatkan username
$username = mysql_real_escape_string($_POST['username']);

// query untuk mengecek username
$result = mysql_query('select username from user_in where username = "'. $username .'"');

// jika username lebih dari 0, maka return available
if(mysql_num_rows($result) > 0){

	echo 0;

// echo 1, menunjukan bahwa username tersedia
}else{

	echo 1;
}

?>