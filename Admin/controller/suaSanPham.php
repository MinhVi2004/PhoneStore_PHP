<?php
      include("connection.php");

      $maSp = $_POST['maSp'];
      $tenSp = $_POST['tenSp'];
      $anhSp = $_POST['anhSp'];
      $loaiSp = $_POST['loaiSp'];
      $giaSp = $_POST['giaSp'];
      $motaSp = $_POST['motaSp'];

      $thayDoiThongTinSanPham = "UPDATE `sanpham` SET `ten_sp` = '{$tenSp}', `anh_sp` = '{$anhSp}', `ma_loai_sp_khoa_ngoai` = '{$loaiSp}', `gia_sp` = '{$giaSp}', `mo_ta` = '{$motaSp}' WHERE `sanpham`.`ma_sp` = '{$maSp}'";
      if(mysqli_query($conn, $thayDoiThongTinSanPham)) {
            echo 1;
      } else {
            echo -1;
            exit();
      }