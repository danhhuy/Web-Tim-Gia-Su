<?php  require_once('C:/xampp/htdocs/BTL_Web/database/database.php'); ?>
<?php 
    if (isset($_POST))
    {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $bir = $_POST['birthday'];
        $date = str_replace('/', '-', $bir);
        $birthday = date('Y-m-d', strtotime($date));
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $pass = $_POST['password'];
        $password = md5(trim($_POST['password']));
        $subject = $_POST['subject'];
        if($subject == "giaSu"){
            $query = "INSERT INTO `giasu`( `ho_giaSu`, `ten_giaSu`, `ngaySinh_giaSu`, `gioiTinh_giaSu`, `email_GiaSu`, `soDT_giaSu`, `matKhau_giaSu`) VALUES ('{$first_name}', '{$last_name}', '{$birthday}', '{$gender}', '{$email}', '{$phone}', '{$password}')";
        }
        elseif ($subject == "phuHuynh") {
            $query = "INSERT INTO `phuhuynh`( `ho_phuHuynh`, `ten_phuHuynh`, `ngaySinh_phuHuynh`, `gioiTinh_phuHuynh`, `email_phuHuynh`, `soDT_phuHuynh`, `matKhau_phuHuynh`) VALUES ('{$first_name}', '{$last_name}', '{$birthday}', '{$gender}', '{$email}', '{$phone}', '{$password}')";
        }
        if(mysqli_query($connection, $query)){
            echo "Thành Công!";
        }
        else{
            echo "Lỗi";
        }
    }
    else echo "Không có dữ liệu";
?>