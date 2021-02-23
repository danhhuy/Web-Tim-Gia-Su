<?php 
    require 'C:/xampp/htdocs/BTL_Web/database/database.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Đăng kí</title>

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
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">



</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Đăng kí</h2>
                    <form>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Họ</label>
                                    <input class="input--style-4" type="text" name="first_name" id="first_name" >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Tên</label>
                                    <input class="input--style-4" type="text" name="last_name" id="last_name" >
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Ngày sinh</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="" name="birthday" id="birthday" >
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Giới tính</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Nam
                                            <input type="radio" checked="checked" name="gender" id="gender" value="1" >
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Nữ
                                            <input type="radio" name="gender" value="0">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" id="email" type="email" name="email"  >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Số điện thoại</label>
                                    <input class="input--style-4" type="text" name="phone" id="phone" >
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2 ">
                                <div class="input-group">
                                    <div class="form-group">
                                      <label class="label" for="">Mật khẩu</label>
                                      <input type="password" class="input--style-4" name="password1" id="password1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                        <label class="label" for="">Nhập lại mật khẩu</label>
                                        <input type="password" class="input--style-4" name="password2" id="password2">
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label">Đối tượng</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="subject" id="subject">
                                    <option disabled="disabled" selected="selected">Lựa chọn</option>
                                    <option value="giaSu">Gia sư</option>
                                    <option value="phuHuynh">Phụ huynh</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="label" id="agree-label">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term"/>
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>Tôi đồng ý với   <a href="#" class="" style="text-decoration: none;">Điều khoản dịch vụ</a></label>
                            <br><a href="login.php" class="" style="text-decoration: none;">Đã có tài khoản</a>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="ok" id="register">Đăng kí</button>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <!-- Main JS-->
    <script src="../assets/js/global.js"></script>
    <script type="text/javascript">
        $(function(){
        $('#register').click(function(e){
            e.preventDefault(); 
            var valid = this.form.checkValidity();
            if(valid){
            let password = $('#password1').val();
            let pass2    = $('#password2').val();
            if(password !== pass2 || password == null){
                $('#password2').addClass('border-danger');
                return;
            }
            if(!($('#agree-term').is(":checked"))){
                $('#agree-label').addClass('border-danger');
                return;
            }
            let data = {
                    first_name: $('#first_name').val(),
                    last_name: $('#last_name').val(),
                    email: $('#email').val(),
                    phone: $('#phone').val(),
                    password: password,
                    subject: $('#subject').val(),
                    birthday: $('#birthday').val(),
                    gender: $('#gender').val()
            }
            console.log("test data: ", data);
                $.ajax({
                    type: 'POST',
                    url: 'process.php',
                    data: data,
                    success: function(data){
                    Swal.fire({
                                'title': 'Thành công',
                                'text': data,
                                'type': 'success'
                                }).then(function(){
                                    window.location.reload();
                                    });                          
                    },
                    error: function(data){
                        Swal.fire({
                                'title': 'Lỗi',
                                'text': 'Không thể tải dữ liệu.',
                                'type': 'error'
                                }).then(function(){
                                    window.location.reload();
                                    });
                    }
                });             
            }
            else{       
            }
        });     
    });
    </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>

