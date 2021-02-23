<?php 
    include 'C:/xampp/htdocs/BTL_Web/database/database.php';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    if(isset($_COOKIE['subject'])&&($_COOKIE['subject']=='giaSu')){
        $subject = 'giaSu';
        $query="SELECT `id_giaSu`, `ho_giaSu`, `ten_giaSu`, `ngaySinh_giaSu`, `gioiTinh_giaSu`, `email_GiaSu`, `soDT_giaSu`, `matKhau_giaSu`, `anh_giaSu` FROM `giasu` WHERE `id_giaSu` = $id";
        $get_infor_product=mysqli_query($connection, $query);
        while ($a = mysqli_fetch_array($get_infor_product)) {
            $lastname   =$a['ten_giaSu'];
            $firstname  =$a['ho_giaSu'];
            $birthday   = $a['ngaySinh_giaSu'];
            $email      = $a['email_GiaSu'];
            $phone      =$a['soDT_giaSu'];
            $password   =$a['matKhau_giaSu'];
        }
        $qls = "SELECT `id_lop`, `moTa`, `lop`, `monHoc`, `soHS`, `hinhThuc`, `thoiGian`, `hocPhi` FROM `lop` WHERE `id_giaSu` = $id";
    }
    else if(isset($_COOKIE['subject'])&&($_COOKIE['subject']=='phuHuynh')){
        $subject = 'phuHuynh';
        $query="SELECT `id_phuHuynh`, `ho_phuHuynh`, `ten_phuHuynh`, `ngaySinh_phuHuynh`, `email_phuHuynh`, `soDT_phuHuynh`, `matKhau_phuHuynh` FROM `phuhuynh` WHERE `id_phuHuynh` = $id";
        $get_infor_product=mysqli_query($connection, $query);
        while ($a = mysqli_fetch_array($get_infor_product)) {
        $lastname   =$a['ten_phuHuynh'];
        $firstname  =$a['ho_phuHuynh'];
        $birthday   = $a['ngaySinh_phuHuynh'];
        $email      = $a['email_phuHuynh'];
        $phone      =$a['soDT_phuHuynh'];
        $password   =$a['matKhau_phuHuynh'];
        }
        $qls = "SELECT `id_lop`, `moTa`, `lop`, `monHoc`, `soHS`, `hinhThuc`, `thoiGian`, `hocPhi` FROM `lop` WHERE `id_phuHuynh` = $id";
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Gia sư 5.0</title>

    <!-- Icons font CSS-->
    <link href="../assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="../assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="../assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">

    <link href="../assets/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../assets/css/main-login-register.css" rel="stylesheet" media="all">

    <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="../assets/css/maicons.css">
  
    <link rel="stylesheet" href="../assets/vendor/animate/animate.css">
  
    <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.min.css">
  
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
  
    <link rel="stylesheet" href="../assets/css/mobster.css">
</head>
<body>

<?php include "header.php" ?>

<main class="bg-light">
    <div class="container">
        <table class="table table-striped">
            <caption>Lớp đã đi vào hoạt động</caption>
            <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">ID lớp</th>
                  <th scope="col">Mô tả</th>
                  <th scope="col">Môn học</th>
                  <th scope="col">Số học sinh</th>
                  <th scope="col">Thời gian</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;       
                if($getData = mysqli_query($connection, $qls)){
                    if(mysqli_num_rows($getData) > 0){
                        while($row = mysqli_fetch_array($getData)){
                        echo'<tr>
                                <th scope="row">'.$i.'</th>
                                <td>'.$row['id_lop'].'</td>
                                <td>'.$row['moTa'].'</td>
                                <td>'.$row['monHoc'].'</td>
                                <td>'.$row['soHS'].'</td>
                                <td>'.$row['thoiGian'].'</td>
                            </tr>';
                        $i++;
                        }
                        mysqli_free_result($getData);
                    }
                    else{
                        echo "Không tìm thấy kết quả.";
                    }
                }
                else{
                    echo "Không thực hiện được truy vấn." . mysqli_error($link);
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="container">
        <table class="table table-striped">
            <caption>Lớp đang đăng ký</caption>
            <thead>
                <?php
                if(isset($_COOKIE['subject'])&&($_COOKIE['subject']=='giaSu')){
                    echo  '<tr>
                        <th scope="col">#</th>
                        <th scope="col">ID lớp</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Môn học</th>
                        <th scope="col">Học phí</th>
                        <th scope="col">Lớp</th>
                        <th scope="col">Thời gian đăng ký</th>
                      </tr>
                    </thead>
                    <tbody>';
                    $i = 1; 
                    $que = "SELECT `id_moLop`, `hocPhi`, `gioiThieu`, `lop`, `ngay`, `monHoc` FROM `molopmoi` WHERE `id_giaSu` = $id";      
                    if($getData = mysqli_query($connection, $que)){
                        if(mysqli_num_rows($getData) > 0){
                            while($row = mysqli_fetch_array($getData)){
                            echo'<tr>
                                    <th scope="row">'.$i.'</th>
                                    <td>'.$row['id_moLop'].'</td>
                                    <td>'.$row['gioiThieu'].'</td>
                                    <td>'.$row['monHoc'].'</td>
                                    <td>'.$row['hocPhi'].'</td>
                                    <td>'.$row['lop'].'</td>
                                    <td>'.$row['ngay'].'</td>
                                </tr>';
                            $i++;
                            }
                            mysqli_free_result($getData);
                        }
                        else{
                            echo "Không tìm thấy kết quả.";
                        }
                    }
                    else{
                        echo "Không thực hiện được truy vấn." . mysqli_error($link);
                    }
                }
                else if(isset($_COOKIE['subject'])&&($_COOKIE['subject']=='phuHuynh')){
                    echo  '<tr>
                        <th scope="col">#</th>
                        <th scope="col">ID lớp</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Môn học</th>
                        <th scope="col">Học phí</th>
                        <th scope="col">Lớp</th>
                        <th scope="col">Số học sinh</th>
                        <th scope="col">Thời gian đăng ký</th>
                      </tr>
                    </thead>
                    <tbody>';
                    $i = 1;
                    $que = "SELECT `id_timGiaSu`, `moTa`, `hocPhi`, `thoiGian`, `soHs`, `monHoc`, `lop` FROM `timgiasu` WHERE `id_phuHuynh` = $id";       
                    if($getData = mysqli_query($connection, $que)){
                        if(mysqli_num_rows($getData) > 0){
                            while($row = mysqli_fetch_array($getData)){
                            echo'<tr>
                                    <th scope="row">'.$i.'</th>
                                    <td>'.$row['id_timGiaSu'].'</td>
                                    <td>'.$row['moTa'].'</td>
                                    <td>'.$row['monHoc'].'</td>
                                    <td>'.$row['hocPhi'].'</td>
                                    <td>'.$row['lop'].'</td>
                                    <td>'.$row['soHs'].'</td>
                                    <td>'.$row['thoiGian'].'</td>
                                </tr>';
                            $i++;
                            }
                            mysqli_free_result($getData);
                        }
                        else{
                            echo "Không tìm thấy kết quả.";
                        }
                    }
                    else{
                        echo "Không thực hiện được truy vấn." . mysqli_error($link);
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="container">
        <form method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Email</label>
                  <input type="email" class="form-control" name="email" value="<?php echo $email;?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Mat Khau</label>
                  <input type="password" class="form-control" name="password" value="<?php echo $email;?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Họ</label>
                <input type="text" class="form-control" name="firstname" value="<?php echo $firstname;?>">
                <label for="inputAddress2">Ten</label>
                <input type="text" class="form-control" name="lastname" value="<?php echo $lastname;?>">
            </div>
            <div class="form-row">
                <div class="col-2">
                    <div class="input-group">
                        <label class="label">Ngày sinh</label>
                        <div class="input-group-icon">
                            <input class="input--style-4 js-datepicker" type="" name="birthday" id="birthday" value="<?php echo $birthday;?>">
                            <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputCity">Số điện thoại</label>
                  <input type="text" class="form-control" name="phone" value="<?php echo $phone;?>">
                </div>
            </div>
            <div class="form-group">
            </div>
          <button type="submit" class="btn btn-primary" name="fix">Sửa</button>
        </form>
    </div>
</main>

<?php include "footer.php" ?>

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/mobster.js"></script>


 <!-- Jquery JS-->
<script src="../assets/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
<script src="../assets/vendor/select2/select2.min.js"></script>
<script src="../assets/vendor/datepicker/moment.min.js"></script>
<script src="../assets/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
<script src="../assets/js/global.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <!-- Main JS-->
    <script src="../assets/js/global.js"></script>
</body>
</html>
<?php
    if(isset($_POST['fix'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $birthday = $_POST['birthday'];
        $phone = $_POST['phone'];
        if($subject=='giaSu'){
            $Query = "UPDATE `giasu` SET `ho_giaSu`='{$firstname}',`ten_giaSu`='{$lastname}',`ngaySinh_giaSu`='{$birthday}',`email_GiaSu`='{$email}',`soDT_giaSu`='{$phone}',`matKhau_giaSu`= '{$password}' WHERE `id_giaSu`='{$id}'";
            mysqli_query($connection,$Query);
        
        }
        else if($subject=='phuHuynh'){
            $Query = "UPDATE `phuHuynh` SET `ho_phuHuynh`='{$firstname}',`ten_phuHuynh`='{$lastname}',`ngaySinh_phuHuynh`='{$birthday}',`email_phuHuynh`='{$email}',`soDT_phuHuynh`='{$phone}',`matKhau_phuHuynh`= '{$password}' WHERE `id_phuHuynh`='{$id}'";
            mysqli_query($connection,$Query);
        }
        echo "<meta http-equiv='refresh' content='0.1;url=myAccount.php"."?id=$id'>";
    } 
 ?>