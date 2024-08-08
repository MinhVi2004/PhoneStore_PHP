<?php
      include("connection.php");

      $tenSp = $_POST['tenSp'];
      $anhSp = $_POST['anhSp'];
      $loaiSp = $_POST['loaiSp'];
      $giaSp = $_POST['giaSp'];
      $motaSp = $_POST['motaSp'];

      $themSanPham = "INSERT INTO `sanpham` (`trang_thai_sp`, `ten_sp`, `anh_sp`, `ma_loai_sp_khoa_ngoai`, `gia_sp`, `so_luong`, `mo_ta`) VALUES ( '1', '{$tenSp}', '{$anhSp}', '{$loaiSp}', '{$giaSp}', '0', '{$motaSp}');";
      if(mysqli_query($conn, $themSanPham)) {
            echo 1;
      } else {
            echo -1;
            exit();
      }