<?php 
	include 'C:/xampp/htdocs/BTL_Web/database/database.php';
	if(isset($_POST['ok'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$content = $_POST['content'];
		$phone = $_POST['phone'];
	$query = "INSERT INTO `phanhoi`(`id_phanHoi`, `hoTen`, `email`, `soDienThoai`, `noiDung`) VALUES ('{$name}','{$email}','{$phone}','{$content}',)";
	mysqli_query($connection, $query);
	}
 ?>