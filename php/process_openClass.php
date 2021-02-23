<?php  require_once('C:/xampp/htdocs/BTL_Web/database/database.php'); 
  session_start();
  if(isset($_SESSION['email']) || isset($_COOKIE['email'])){
    $email = $_SESSION['email'];
    $query = "SELECT `id_phuHuynh` FROM `phuhuynh` WHERE `email_phuhuynh` = '{$email}'";
    $getInfor = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($getInfor);
    $id = $row['id_phuHuynh'];
  }

    if (isset($_POST))
    {
        $title =  $_POST['title'];
        $description =  $_POST['description'];
        $tuition =  $_POST['tuition'];
        $level =  $_POST['level'];
        $subject = $_POST['subject'];
        $amount = $_POST['amount'];
        $time = $_POST['time'];
        $query = "INSERT INTO `timgiasu`(`moTa`, `hocPhi`, `id_phuHuynh`, `thoiGian`, `soHs`, `chiTiet`, `monHoc`, `lop`) VALUES ('{$title}', '{$tuition}', '{$id}', '{$time}', '{$amount}', '{$description}','{$subject}', '{$level}')";
        if(mysqli_query($connection, $query)){
            echo "Thành Công!";
        }
        else{
            echo "Lỗi";
        }
    }
    else echo "Không có dữ liệu";
?> 