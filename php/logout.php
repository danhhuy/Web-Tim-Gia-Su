<?php 
session_start();
setcookie('userName','',time()+0);
session_destroy();
header('location: login.php');
 ?>