<?php include 'C:/xampp/htdocs/BTL_Web/database/database.php';
	if (isset($_POST))
    {
        $id_lop = $_POST['id_lop'];
        $id_giaSu = $_POST['id_giaSu'];
        $query = "SELECT* from `timgiasu` WHERE id_timGiaSu = '{$id_lop}'";
        $getData = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($getData);
        $hocPhi = $row['hocPhi'];
        $id_phuHuynh = $row['id_phuHuynh'];
        $thoiGian = $row['thoiGian'];
        $soHS = $row['soHs'];
        $monHoc= $row['monHoc'];
        $lop = $row['lop'];
        $moTa = $row['moTa'];
        $chiTiet = $row['chiTiet'];
        $query = "INSERT INTO `lop`(`moTa`, `chiTiet`, `lop`, `monHoc`, `soHS`, `hinhThuc`, `id_giaSu`, `id_phuHuynh`, `thoiGian`, `hocPhi`) VALUES('{$moTa}','{$chiTiet}', '{$lop}', '{$monHoc}','{$soHS}','offline','{$id_giaSu}','{$id_phuHuynh}','{$thoiGian}','{$hocPhi}') ";
        if(mysqli_query($connection, $query)){
            $sql = "DELETE FROM `timgiasu` WHERE `id_timGiaSu`='{$id_lop}'";
            mysqli_query($connection, $sql);
            echo "ĐĂNG KÝ THÀNH CÔNG!";
        }
    }
    else echo "Không có dữ liệu"; 

 ?>