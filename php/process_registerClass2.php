<?php include 'C:/xampp/htdocs/BTL_Web/database/database.php';
	if (isset($_POST))
    {
        $id_lop = $_POST['id_lop'];
        $id_phuHuynh = $_POST['id_phuHuynh'];
        $query = "SELECT* from `molopmoi` WHERE id_moLop = '{$id_lop}'";
        $getData = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($getData);
        $hocPhi = $row['hocPhi'];
        $id_giaSu = $row['id_giaSu'];
        $thoiGian = $row['ngay'];
        $monHoc= $row['monHoc'];
        $lop = $row['lop'];
        $moTa = $row['gioiThieu'];
        $chiTiet = $row['noiDung'];
        $query = "INSERT INTO `lop`(`moTa`, `chiTiet`, `lop`, `monHoc`, `soHS`, `hinhThuc`, `id_giaSu`, `id_phuHuynh`, `thoiGian`, `hocPhi`) VALUES('{$moTa}','{$chiTiet}', '{$lop}', '{$monHoc}','1','offline','{$id_giaSu}','{$id_phuHuynh}','{$thoiGian}','{$hocPhi}') ";
        if(mysqli_query($connection, $query)){
            $sql = "DELETE FROM `molopmoi` WHERE `id_moLop`='{$id_lop}'";
            mysqli_query($connection, $sql);
            echo "ĐĂNG KÝ THÀNH CÔNG!";
        }
    }
    else echo "Không có dữ liệu";

 ?>