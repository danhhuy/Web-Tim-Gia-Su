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
    <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="../assets/css/maicons.css">
  
    <link rel="stylesheet" href="../assets/vendor/animate/animate.css">
  
    <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.min.css">
  
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
  
    <link rel="stylesheet" href="../assets/css/mobster.css">
</head>

<body>
<?php include 'header.php' ?>
<main class="bg-light">
    <div class="page-wrapper  p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w960">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Đăng kí lớp mới</h2>
                    <form>
                        <div class="row-space">
                            <div class="input-group">
                                <label class="label">Nội dung</label>
                                <input class="input--style-4" type="text" id="title" name="title">
                            </div>
                            <div class="input-group">
                                <label class="label">Giới Thiệu Chung</label>
                                <input class="input--style-4" type="text" id="description" name="description">
                            </div>
                            <div class="input-group">
                                <label class="label">Học Phí</label>
                                <input class="input--style-4" type="text" id="tuition" name="tuition">
                            </div>
                            <div class="input-group">
                                <label class="label">Lớp</label>
                                <input class="input--style-4" type="text" id="level" name="level">
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label">Môn học</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="subject" id="subject">
                                    <option disabled="disabled" selected="selected">Lựa chọn</option>
                                    <option value="toan">Toán</option>
                                    <option value="ly">Lý</option>
                                    <option value="hoa">Hóa</option>
                                    <option value="van">Văn</option>
                                    <option value="su">Sử</option>
                                    <option value="dia">Địa</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="label" id="agree-label">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term"/>
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>Tôi đồng ý với   <a href="#" class="" style="text-decoration: none;">Điều khoản dịch vụ</a></label>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn-primary" type="submit" name="ok" id="register">Đăng ký mở lớp</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include "footer.php" ?>
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
            
            if(!($('#agree-term').is(":checked"))){
                $('#agree-label').addClass('border-danger');
                return;
            }
            let data = {
                title: $('#title').val(),
                description: $('#description').val(),
                tuition: $('#tuition').val(),
                level: $('#level').val(),
                subject: $('#subject').val(),
              }
              console.log("test data: ", data);

                $.ajax({
                    type: 'POST',
                    url: 'process_newClass.php',
                    data: data,
                    success: function(data){
                    Swal.fire({
                                'title': 'Successful',
                                'text': data,
                                'type': 'success'
                                }).then(function(){
                                    window.location.reload();
                                    });                         
                    },
                    error: function(data){
                        Swal.fire({
                                'title': 'Errors',
                                'text': 'There were errors while saving the data.',
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
<!-- end document-->