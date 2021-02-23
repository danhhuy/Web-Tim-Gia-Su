<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="description" content="Mobile Application HTML5 Template">

  <title>Gia sư 5.0</title>

  <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.min.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/css/mobster.css">
</head>
<body>

<?php include 'header.php' ?>

<div class="bg-light">

  <div class="page-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10 my-3 wow fadeInUp">
          <div class="card-page">
            <div class="row row-beam-md">
              <div class="col-md-4 text-center py-3 py-md-2">
                <i class="mai-location-outline h3"></i>
                <p class="fg-primary fw-medium fs-vlarge">Địa chỉ</p>
                <p class="mb-0">1 Đại Cồ Việt, Bách Khoa, Hai Bà Trưng, Hà Nội, Việt Nam</p>
              </div>
              <div class="col-md-4 text-center py-3 py-md-2">
                <i class="mai-call-outline h3"></i>
                <p class="fg-primary fw-medium fs-vlarge">Liên hệ</p>
                <p class="mb-1">0123456789</p>
                <p class="mb-0">0123456789</p>
              </div>
              <div class="col-md-4 text-center py-3 py-md-2">
                <i class="mai-mail-open-outline h3"></i>
                <p class="fg-primary fw-medium fs-vlarge">Email</p>
                <p class="mb-0">support.danhhuy@gmail.com</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-5 my-3 wow fadeInUp">
          <div class="card-page">
            <h3 class="fw-normal"></h3>
            <form method="POST" class="mt-3" action="contact-form.php">
              <div class="form-group">
                <label for="name" class="fw-medium fg-grey">Họ tên</label>
                <input type="text" class="form-control" name="name">
              </div>
    
              <div class="form-group">
                <label for="email" class="fw-medium fg-grey">Email</label>
                <input type="text" class="form-control" name="email">
              </div>

              <div class="form-group">
                <label for="phone" class="fw-medium fg-grey">Điện thoại (Bắt buộc)</label>
                <input type="number" class="form-control" name="phone">
              </div>
    
              <div class="form-group">
                <label for="message" class="fw-medium fg-grey">Nội dung</label>
                <textarea rows="3" class="form-control" name="content"></textarea>
              </div>
              <p>*Thông tin của bạn sẽ không bao giờ được chia sẻ với bất kỳ bên thứ ba.</p>
              <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary" name="ok">Gửi tin nhắn</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6 col-lg-7 my-3 wow fadeInUp">
          <div class="card-page">
            <div class="maps-container">
              <div id="myMap"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div> <!-- .bg-light -->


<div class="page-footer-section bg-dark fg-white">
  <div class="container">
    <div class="row mb-5 py-3">
      <div class="col-sm-6 col-lg-2 py-3">
        <h5 class="mb-3">Danh mục gia sư</h5>
        <ul class="menu-link">
          <li><a href="#" class="">Gia sư Toán</a></li>
          <li><a href="#" class="">Gia sư Lý</a></li>
          <li><a href="#" class="">Gia sư Văn</a></li>
          <li><a href="#" class="">Gia sư Ngoại Ngữ</a></li>
          <li><a href="#" class="">Xem thêm</a></li>
        </ul>
      </div>
      <div class="col-sm-6 col-lg-2 py-3">
        <h5 class="mb-3">Dành cho gia sư</h5>
        <ul class="menu-link">
          <li><a href="#" class="">Đăng kí trở thành gia sư</a></li>
          <li><a href="#" class="">Danh sách gia sư</a></li>
          <li><a href="#" class="">Chính sách gia sư</a></li>
          <li><a href="#" class="">Cam kết</a></li>
          <li><a href="#" class="">Hướng dẫn</a></li>
        </ul>
      </div>
      <div class="col-md-6 col-lg-4 py-3">
        <h5 class="mb-3">Hỗ trợ</h5>
        <ul class="menu-link">
          <li><a href="#" class="">Tuyển dụng</a></li>
          <li><a href="#" class="">Liện hệ với chúng tôi</a></li>
          <li><a href="#" class="">Địa chỉ</a></li>
          <li><a href="#" class="">support.ducnguyen@gmail.com</a></li>
          <li><a href="#" class="">support.danhhuy@gmail.com</a></li>
          <li><a href="#" class="">19001010</a></li>
        </ul>
      </div>
      <div class="col-md-6 col-lg-4 py-3">
        <h5 class="mb-3">Đăng ký nhận tin & kết nối</h5>
        <p>Đăng ký email để nhận tin mới nhất từ chúng tôi</p>
        <form method="POST">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Email..">
            <div class="input-group-append">
              <button type="submit" class="btn btn-primary"><span class="mai-send"></span></button>
            </div>
          </div>
        </form>

        <!-- Social Media Button -->
        <div class="mt-4">
          <a href="#" class="btn btn-fab btn-primary fg-white"><span class="mai-logo-facebook"></span></a>
          <a href="#" class="btn btn-fab btn-primary fg-white"><span class="mai-logo-twitter"></span></a>
          <a href="#" class="btn btn-fab btn-primary fg-white"><span class="mai-logo-instagram"></span></a>
          <a href="#" class="btn btn-fab btn-primary fg-white"><span class="mai-logo-google"></span></a>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/mobster.js"></script>

<script src="../assets/js/google-maps.js"></script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script>

</body>
</html>