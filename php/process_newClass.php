<?php  require_once('C:/xampp/htdocs/BTL_Web/database/database.php'); 
  session_start();
  if(isset($_SESSION['email']) || isset($_COOKIE['email'])){
    $email = $_SESSION['email'];
    $query = "SELECT `id_giaSu` FROM `giasu` WHERE `email_giaSu` = '{$email}'";
    $getInfor = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($getInfor);
    $id = $row['id_giaSu'];
  }

    if (isset($_POST))
    {
        $title =  $_POST['title'];
        $description =  $_POST['description'];
        $tuition =  $_POST['tuition'];
        $level =  $_POST['level'];
        $today = date("Y-m-d");
        $subject = $_POST['subject'];
        $query = "INSERT INTO `molopmoi`(`hocPhi`, `id_giaSu`, `gioiThieu`, `lop`, `noiDung`, `ngay`,`monHoc`) VALUES ('{$tuition}', '{$id}', '{$title}', '{$level}', '{$description}', '{$today}','{$subject}')";
        if(mysqli_query($connection, $query)){
            echo "Thành Công!";
        }
        else{
            echo "Lỗi";
        }
    }
    else echo "Không có dữ liệu";
?> 