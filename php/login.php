<?php 
    session_start();
    include 'C:/xampp/htdocs/BTL_Web/database/database.php';
    if(isset($_SESSION['email']) || isset($_COOKIE['email'])){
        echo "<meta http-equiv='refresh' content='0.1;url=login.php'>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Đăng nhập</title>

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
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Đăng nhập</h2>
                    <form method="POST" action="#" method="POST">
                        <div class="row-login">
                            <div class="">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="row-login">
                            <div class="">
                                <div class="input-group">
                                    <div class="form-group">
                                        <label class="label" for="">Mật khẩu</label>
                                        <input type="password" class="input--style-4" name="password" id="" placeholder="">
                                      </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label">Đối tượng</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="subject">
                                    <option disabled="disabled" selected="selected">Lựa chọn</option>
                                    <option value="giaSu">Gia sư</option>
                                    <option value="phuHuynh">Phụ huynh</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="label">
                            <input type="checkbox" name="nho" id="remember-me" class="agree-term" />
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Nhớ mật khẩu</label>
                        </div>
                        <div class="social-login">
                            <span class="social-label label">Hoặc đăng nhập với</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                        <a class="label" href="register.php">Chưa có tài khoản</a>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="ok">Đăng nhập</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="../assets/vendor/select2/select2.min.js"></script>
    <script src="../assets/vendor/datepicker/moment.min.js"></script>
    <script src="../assets/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="../assets/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<?php 
    if(isset($_POST['ok'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        if($_POST['subject'] == "giaSu"){
            $query = "SELECT * FROM `giasu` WHERE `email_GiaSu` = '{$email}' AND `matkhau_giaSu` = '{$password}'" ;
        }
        elseif($_POST['subject'] == "phuHuynh"){
            $query = "SELECT * FROM `phuhuynh` WHERE `email_phuHuynh` = '{$email}' AND `matkhau_phuHuynh` = '{$password}'" ;
        }
        $que = mysqli_query($connection, $query);
        if(mysqli_num_rows($que) == 1){
            if(isset($_POST['nho']) && $_POST['nho'] == 1){
                setcookie('email', $email, time()+3600);
                echo "<meta http-equiv='refresh' content='0.1;url=index.php'>";
            }
            else{
                $_SESSION['email'] = $email;
                echo "<meta http-equiv='refresh' content='0.1;url=index.php'>";
            }
        }
        else{
            echo "<meta http-equiv='refresh' content='0.1;url=login.php'>";
        }

    }
 ?>