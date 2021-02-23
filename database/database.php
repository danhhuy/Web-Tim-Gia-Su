<?php 
	$host = "localhost";
	$dtb_name = "root";
	$dtb_password = "";
	$name_database = "WebGiaSu";
	$connection = mysqli_connect($host, $dtb_name, $dtb_password, $name_database) or die("lỗi kết nối");
	mysqli_set_charset($connection, "utf8");
 ?>