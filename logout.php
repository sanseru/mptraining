<?php
session_start();
session_destroy();
echo"<script language='javascript'>
alert('Anda Berhasil Logout');
</script>";
header("location:main.php");
?>