<?php
      include("connection.php");

      $ma_sp = $_POST['ma_sp'];
      $xoaSanPham = "UPDATE `sanpham` SET `trang_thai_sp` = '0' WHERE `sanpham`.`ma_sp` = {$ma_sp}";
      if(mysqli_query($conn, $xoaSanPham)) {
            echo 1;
      } else {
            echo -1;
            exit();
      }