<?php 
  include 'C:/xampp/htdocs/BTL_Web/database/database.php';
  session_start();
  if(isset($_SESSION['email']) || isset($_COOKIE['email'])){
    $email = $_SESSION['email'];
    $query = "SELECT `id_giaSu`, `ho_giaSu`, `ten_giaSu` FROM `giasu` WHERE `email_giaSu` = '{$email}'";
    $getInfor = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($getInfor);
    if(isset($row))
    {
      $name = $row['ten_giaSu'];
      $ho = $row['ho_giaSu'];
      $id = $row['id_giaSu'];
      setcookie('subject', 'giaSu', time()+3600);
    }
    else{
      $query = "SELECT `id_phuHuynh`, `ho_phuHuynh`, `ten_phuHuynh` FROM `phuhuynh` WHERE `email_phuHuynh` = '{$email}'";
      $getInfor = mysqli_query($connection, $query);
      $row = mysqli_fetch_array($getInfor);
      $name = $row['ten_phuHuynh'];
      $ho = $row['ho_phuHuynh'];
      $id = $row['id_phuHuynh'];
      setcookie('subject', 'phuHuynh', time()+3600);
    }    
  }
  $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);     
 ?>
<link rel="stylesheet" href="../assets/css/Style.css" media="all">

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<nav class="navbar navbar-expand-lg navbar-light navbar-floating" style="height:380px;align-items: start;">
  <div class="container" >
    <a class="navbar-brand" href="#">
      <img src="../assets/favicon-light.png" alt="" width="40">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarToggler">
      <ul class="navbar-nav ml-lg-5 mt-3 mt-lg-0">
        <li class="nav-item dropdown <?php if($curPageName == 'index.php') echo'active' ?>">
          <a class="nav-link dropdown-toggle" href="index.php" id="navbarDropdown" >Trang chủ</a>
        </li>
        <li class="nav-item <?php if($curPageName == 'newClass.php') echo'active' ?>">
          <a class="nav-link" href="newClass.php">Lớp mới</a>
        </li>
        <li class="nav-item <?php if($curPageName == 'giaSu.php') echo'active' ?>">
          <?php
          if(isset($_COOKIE['subject'])&&($_COOKIE['subject']=='giaSu')){
              echo '<a class="nav-link" href="giaSu.php">Gia sư</a>';
          }
          else echo '<a class="nav-link" href="#">Gia sư</a>'
          ?>
        </li>
        <li class="nav-item <?php if($curPageName == 'phuHuynh.php') echo'active' ?>">
          <?php
            if(isset($_COOKIE['subject'])&&($_COOKIE['subject']=='phuHuynh')){
                echo '<a class="nav-link" href="phuHuynh.php">Phụ huynh</a>';
            }
            else echo '<a class="nav-link" href="#">Phụ huynh</a>'
          ?>
        </li>
        <li class="nav-item <?php if($curPageName == 'about.php') echo'active' ?>">
          <a class="nav-link" href="about.php">Giới thiệu</a>
        </li>
        <li class="nav-item <?php if($curPageName == 'contact.php') echo'active' ?>">
          <a class="nav-link" href="contact.php">Liên hệ</a>
        </li>
      </ul>
      <?php
          if(isset($_SESSION['email']) || isset($_COOKIE['email'])){
            echo'<div class="bar-account">
              <ul>
                <li> ';echo $name." ".$ho; 
                echo'
                  <ul>
                    <li >
                      <a href="myAccount.php?id='.$id.'">My Account</a>
                    </li>
                    <li >
                      <a href="logout.php">Log Out</a>
                    </li>
                  </ul>
                </li>
              </ul>
              <i class="fas fa-chevron-down icAcc"></i>
            </div>';
          }
          else{
            echo'
            <div class=" ml-auto my-2 my-lg-0">
              <button class="btn btn-dark rounded-pill">
                <a href="register.php" class="nav-link"> Đăng ký</a></button>
              <button class="btn btn-dark rounded-pill"><a href="login.php" class="nav-link"> Đăng nhập</a></button>
            </div>';
          } 
        ?>
    </div>
  </div>
</nav>
  
<div class="page-hero-section bg-image hero-mini" style="background-image: url(../assets/img/hero_mini.svg);">
  <div class="hero-caption pt-5">
    <div class="container h-100">
      <div class="row align-items-center h-100">       
        <div class="col-lg-6 d-none d-lg-block wow zoomIn">
        </div>
      </div>
    </div>
  </div>
</div>
