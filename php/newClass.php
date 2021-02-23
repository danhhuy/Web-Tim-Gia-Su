<?php include 'C:/xampp/htdocs/BTL_Web/database/database.php';
  
  if(!empty($_GET['action']) && $_GET['action'] == 'search' && !empty($_POST)){
    $_SESSSION['filter'] = $_POST;
  }
  if(!empty($_SESSSION['filter'])){
    $where = "";
    foreach ($_SESSSION['filter'] as $field => $value) {
      if(!empty($value)){
        switch ($field) {
          case 'choices1':
            if($value == "tieuhoc")      !(empty($where))? $where .= " AND `lop`> 0 AND `lop` < 6 " : $where .= " `lop`> 0 AND `lop` < 6 ";
            else if($value == "trunghoc")!(empty($where))? $where .= " AND `lop`> 5 AND `lop` < 10 " :$where .= "`lop`> 5 AND `lop` < 10 ";
            else if($value == "phothong")!(empty($where))? $where .= " AND `lop`> 9 AND `lop` < 13 " : $where .= "`lop`> 9 AND `lop` < 13 ";
            else                         !(empty($where))? $where .= " AND `lop`> 12 " : $where .= "`lop` > '12'";
            break;
          case 'choices2':
            if($value == "100k")      !(empty($where))? $where .= " AND `hocPhi` >= 100000 " : $where .= "  `hocPhi` >= 100000";
            else if($value == "200k") !(empty($where))? $where .= " AND `hocPhi` >= 200000 " : $where .= "  `hocPhi` >= 200000";
            else                      !(empty($where))? $where .= " AND `hocPhi` >= 300000 " : $where .= "  `hocPhi` >= 300000";
            break;
          case 'choices3':
            if($value == "toan")      !(empty($where))? $where .= " AND `monHoc` LIKE '%toan%' " : $where .= "  `monHoc` LIKE '%toan%' ";
            else if($value == "ly")   !(empty($where))? $where .= " AND `monHoc` LIKE '%ly%' " :$where .= "  `monHoc` LIKE '%ly%' ";
            else if($value == "hoa")  !(empty($where))? $where .= " AND `monHoc` LIKE '%hoa%' " :$where .= "  `monHoc` LIKE '%hoa%' ";
            else if($value == "van")  !(empty($where))? $where .= " AND `monHoc` LIKE '%van%' " :$where .= "  `monHoc` LIKE '%van%' ";
            else if($value == "sinh") !(empty($where))? $where .= " AND `monHoc` LIKE '%sinh%' " :$where .= "  `monHoc` LIKE '%sinh%' ";
            else                      !(empty($where))? $where .= " AND `monHoc` LIKE '%anh%' " :$where .= "  `monHoc` LIKE '%anh%' ";
            break;
          default:
            
            break;
        }
      }
    }
  }
  if(isset($_COOKIE['subject']) && ($_COOKIE['subject'] =='giaSu') && !empty($where)){
    $qlsNewClass = "SELECT * FROM `timgiasu` WHERE (".$where.")";
    $num = "SELECT count(id_timGiaSu) AS total FROM `timgiasu` WHERE (".$where.")";
  }
  else if(isset($_COOKIE['subject']) && ($_COOKIE['subject'] =='giaSu') && empty($where)){
    $qlsNewClass = "SELECT * FROM `timgiasu`";
    $num = "SELECT count(id_timGiaSu) AS total FROM `timgiasu` ";
  } 
  else if(isset($_COOKIE['subject']) && ($_COOKIE['subject'] =='phuHuynh') && !empty($where)){
    $qlsNewClass = "SELECT * FROM `molopmoi` WHERE (".$where.")";
    $num = "SELECT count(id_moLop) AS total FROM `molopmoi` WHERE (".$where.")";
  }
  else if(isset($_COOKIE['subject']) && ($_COOKIE['subject'] =='phuHuynh') && empty($where)){
    $qlsNewClass = "SELECT * FROM `molopmoi`";
    $num = "SELECT count(id_moLop) AS total FROM `molopmoi`";
  }
?>
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

  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>

<?php include 'header.php' ?>

<main>
  <div class="s010">
    <form id="search-form" action="newClass.php?action=search" method="POST">
      <div class="inner-form">
        <div class="basic-search">
          <div class="input-field">
            <input id="search" type="text" placeholder="Tìm gia sư theo môn học" />
            <div class="icon-wrap">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
              </svg>
            </div>
          </div>
        </div>
        <div class="advance-search" style="z-index: 1000;">
          <div class="row">
            <div class="input-field">
              <div class="input-select">
                <select data-trigger="" name="choices1">
                  <option placeholder="" value="">Lớp</option>
                  <option value="tieuhoc">Lớp Tiểu học</option>
                  <option value="trunghoc">Lớp Trung học</option>
                  <option value="phothong">Lớp Phổ thông</option>
                  <option value="daihoc">Đại học</option>
                </select>
              </div>
            </div>
            <div class="input-field">
              <div class="input-select">
                <select data-trigger="" name="choices2">
                  <option placeholder="" value="">Học Phí</option>
                  <option value="100k">>100k</option>
                  <option value="200k">>200k</option>
                  <option value="300k">>300k</option>
                </select>
              </div>
            </div>
            <div class="input-field">
              <div class="input-select">
                <select data-trigger="" name="choices3">
                  <option placeholder="" value="">Môn học</option>
                  <option value="toan">Toán</option>
                  <option value="ly">Lý</option>
                  <option value="hoa">Hóa</option>
                  <option value="van">Sinh</option>
                  <option value="sinh">Văn</option>
                  <option value="anh">Anh</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row third">
            <div class="input-field">
              <div class="result-count">
                <span><?php if(isset($num)){ $count=mysqli_query($connection,$num);
                        $data=mysqli_fetch_assoc($count);
                        echo $data['total'];}
                        else echo ''; ?> </span>Kết quả</div>
              <div class="group-btn">
                <button class="btn-search">Tìm kiếm</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  <script src="../assets/js/extention/choices.js"></script>
  <script>
    const customSelects = document.querySelectorAll("select");
    const deleteBtn = document.getElementById('delete')
    const choices = new Choices('select',
    {
      searchEnabled: false,
      itemSelectText: '',
      removeItemButton: true,
    });
    for (let i = 0; i < customSelects.length; i++)
    {
      customSelects[i].addEventListener('addItem', function(event)
      {
        if (event.detail.value)
        {
          let parent = this.parentNode.parentNode
          parent.classList.add('valid')
          parent.classList.remove('invalid')
        }
        else
        {
          let parent = this.parentNode.parentNode
          parent.classList.add('invalid')
          parent.classList.remove('valid')
        }
      }, false);
    }
    deleteBtn.addEventListener("click", function(e)
    {
      e.preventDefault()
      const deleteAll = document.querySelectorAll('.choices__button')
      for (let i = 0; i < deleteAll.length; i++)
      {
        deleteAll[i].click();
      }
    });

  </script>

  <div class="page-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 py-3">
          <?php         
          if(isset($_COOKIE['subject']) && ($_COOKIE['subject'] =='giaSu')){
            if($getInfor = mysqli_query($connection, $qlsNewClass)){
              if(mysqli_num_rows($getInfor) > 0){
                while($row = mysqli_fetch_array($getInfor)){
                  echo '<article class="blog-entry">
                        <div class="entry-header">
                          <div class="post-thumbnail">
                            <img src="../assets/img/blogs/blog_4.jpg" alt="">
                          </div>
                          <div class="post-date">
                            <h3></h3>
                            <span>'.$row['thoiGian'].'</span>
                          </div>
                        </div>
                        <div class="post-title"><a href="blog-details.html">'.$row['moTa'].'</a></div>
                        <div class="entry-meta mb-2">
                          <div class="meta-item entry-author">
                            <div class="icon">
                              <span class="mai-person"></span>  
                            </div>
                            by <a href="#">';$Id= $row['id_phuHuynh'];$que = "SELECT `ho_phuHuynh`, `ten_phuHuynh` FROM `phuHuynh` WHERE `id_phuHuynh`='{$Id}'";
                                            $getdata = mysqli_query($connection, $que);
                                            $Row = mysqli_fetch_array($getdata);
                                            echo $Row['ho_phuHuynh'].' '.$Row['ten_phuHuynh'].'</a>
                          </div>
                          <div class="meta-item">
                            <div class="icon">
                              <span class="mai-pricetags"></span>
                            </div>
                            <a href="#">'.$row['monHoc'].'</a>, 
                            <a href="#">'."lop:".$row['lop'].'</a>
                          </div>
                          <div class="meta-item">
                            <div class="icon">
                              <i class="bi bi-people-fill"></i>
                            </div>
                            <a href="#">'.$row['soHs'].'</a>
                          </div>
                          <div class="meta-item">
                            <div class="icon">
                              <i class="bi bi-cash-stack"></i>
                            </div>
                            <a href="#">'.$row['hocPhi'].'</a>
                          </div>
                        </div>
                        <div class="entry-content">
                          <p>'.$row['chiTiet'].'.</p>
                        </div>
                        <button type="button" class="btn btn-primary btn-lg" onclick="insertClass1('.$row['id_timGiaSu'].')" id="register"">Đăng Ký</button>
                      </article>';
                }
                mysqli_free_result($getInfor);
              }
              else{
                echo "Không tìm thấy kết quả.";
              }
            }
            else{
              echo "Không thực hiện được truy vấn." . mysqli_error($link);
            }
          }

          if(isset($_COOKIE['subject']) && ($_COOKIE['subject'] =='phuHuynh')){
            if($getInfor = mysqli_query($connection, $qlsNewClass)){
              if(mysqli_num_rows($getInfor) > 0){
                while($row = mysqli_fetch_array($getInfor)){
                  echo '<article class="blog-entry">
                        <div class="entry-header">
                          <div class="post-thumbnail">
                            <img src="../assets/img/blogs/blog_4.jpg" alt="">
                          </div>
                          <div class="post-date">
                            <h3></h3>
                            <span>'.$row['ngay'].'</span>
                          </div>
                        </div>
                        <div class="post-title"><a href="blog-details.html">'.$row['gioiThieu'].'</a></div>
                        <div class="entry-meta mb-2">
                          <div class="meta-item entry-author">
                            <div class="icon">
                              <span class="mai-person"></span>  
                            </div>
                            by <a href="#">';$Id= $row['id_giaSu'];$que = "SELECT `ho_giaSu`, `ten_giaSu` FROM `giaSu` WHERE `id_giaSu`='{$Id}'";
                                            $getdata = mysqli_query($connection, $que);
                                            $Row = mysqli_fetch_array($getdata);
                                            echo $Row['ho_giaSu'].' '.$Row['ten_giaSu'].'</a>
                          </div>
                          <div class="meta-item">
                            <div class="icon">
                              <span class="mai-pricetags"></span>
                            </div>
                            <a href="#">'.$row['monHoc'].'</a>, 
                            <a href="#">'."lop:".$row['lop'].'</a>
                          </div>
                          <div class="meta-item">
                            <div class="icon">
                              <i class="bi bi-cash-stack"></i>
                            </div>
                            <a href="#">'.$row['hocPhi'].'</a>
                          </div>
                        </div>
                        <div class="entry-content">
                          <p>'.$row['noiDung'].'.</p>
                        </div>
                        <button type="button" class="btn btn-primary btn-lg" onclick="insertClass2('.$row['id_moLop'].')" id="register"">Đăng Ký</button>
                      </article>';
                }
                mysqli_free_result($getInfor);
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
        </div>
        <!-- Sidebar -->
        <div class="col-lg-4 py-3" style="z-index:0;">

            <div class="widget-wrap">
              <h3 class="widget-title">Thống Kê</h3>
              <ul class="categories">
                <li><a href="#">Số gia sư <span><?php $count1=mysqli_query($connection,"SELECT count(id_giaSu) as total from giasu");
                                                      $data=mysqli_fetch_assoc($count1);
                                                      echo $data['total']; ?></span></a></li>
                <li><a href="#">Số phụ huynh <span><?php $count1=mysqli_query($connection,"SELECT count(id_phuhuynh) as total from phuhuynh");
                                                      $data=mysqli_fetch_assoc($count1);
                                                      echo $data['total']; ?></span></a></li>
                <li><a href="#">Số lớp tìm gia sư <span><?php $count1=mysqli_query($connection,"SELECT count(id_timGiaSu) as total from timgiasu");
                                                      $data=mysqli_fetch_assoc($count1);
                                                      echo $data['total']; ?></span></a></li>
                <li><a href="#">Số lớp tìm học sinh <span><?php $count1=mysqli_query($connection,"SELECT count(id_moLop) as total from molopmoi");
                                                      $data=mysqli_fetch_assoc($count1);
                                                      echo $data['total']; ?></span></a></li>
                <li><a href="#">Số lớp đã đi vào hoạt động <span><?php $count1=mysqli_query($connection,"SELECT count(id_lop) as total from lop");
                                                      $data=mysqli_fetch_assoc($count1);
                                                      echo $data['total']; ?></span></a></li>
              </ul>
            </div>
            <div class="widget-wrap">
              <h3 class="widget-title">Gia sư nổi bật</h3>
              <div class="blog-widget">
                <div class="team-avatar">
                  <img src="../assets/img/person/person_2.png" alt="">
                </div>
                <div class="entry-footer">
                  <div class="blog-title mb-2" style="font-size: 20px;"><a href="#">Đức Nguyễn</a></div>
                  <div class="meta" style="font-size: 14px;">
                    <a href="#"><span class="icon-calendar"></span>20 tuổi</a>
                    <a href="#"><span class="icon-person"></span> Thái bình</a>
                    <a href="#"><span class="icon-chat"></span> Đại học Bách Khoa</a>
                  </div>
                </div>
              </div>
              <div class="blog-widget">
                <div class="team-avatar">
                  <img src="../assets/img/person/person_2.png" alt="">
                </div>
                <div class="entry-footer">
                  <div class="blog-title mb-2" style="font-size: 20px;"><a href="#">Danh Huy</a></div>
                  <div class="meta" style="font-size: 14px;">
                    <a href="#"><span class="icon-calendar"></span>20 tuổi</a>
                    <a href="#"><span class="icon-person"></span> Hà nội</a>
                    <a href="#"><span class="icon-chat"></span> Đại học Bách Khoa</a>
                  </div>
                </div>
              </div>
              <div class="blog-widget">
                <div class="team-avatar">
                  <img src="../assets/img/person/person_2.png" alt="">
                </div>
                <div class="entry-footer">
                  <div class="blog-title mb-2" style="font-size: 20px;"><a href="#">Phương Nam</a></div>
                  <div class="meta" style="font-size: 14px;">
                    <a href="#"><span class="icon-calendar"></span>20 tuổi</a>
                    <a href="#"><span class="icon-person"></span>Hà nội</a>
                    <a href="#"><span class="icon-chat"></span> Đại học Bách Khoa</a>
                  </div>
                </div>
              </div>
              <div class="blog-widget">
                <div class="team-avatar">
                  <img src="../assets/img/person/person_2.png" alt="">
                </div>
                <div class="entry-footer">
                  <div class="blog-title mb-2" style="font-size: 20px;"><a href="#">Thanh Lâm</a></div>
                  <div class="meta" style="font-size: 14px;">
                    <a href="#"><span class="icon-calendar"></span>20 tuổi</a>
                    <a href="#"><span class="icon-person"></span> Hà nội</a>
                    <a href="#"><span class="icon-chat"></span> Đại học Bách Khoa</a>
                  </div>
                </div>
              </div>
            </div>
        </div> <!-- end sidebar -->
      </div>
    </div>
  </div>

</main>


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
</div> <!-- .page-footer -->



<script src="../assets/js/bootstrap.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/mobster.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

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
  function insertClass1(a){
    let data = {  id_lop:a,
                  id_giaSu: <?php echo $id; ?>}
    console.log(data);
    $.ajax({
      type: 'POST',
      url: 'process_registerClass1.php',
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
  function insertClass2(a){
    let data = {  id_lop:a,
                  id_phuHuynh: <?php echo $id; ?>}
    console.log(data);
    $.ajax({
      type: 'POST',
      url: 'process_registerClass2.php',
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
      },
    });
  } 
</script>
</body>
</html>