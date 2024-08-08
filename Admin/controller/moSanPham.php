<?php
      include("connection.php");

      $ma_sp = $_POST['ma_sp'];
      $moSanPham = "UPDATE `sanpham` SET `trang_thai_sp` = '1' WHERE `sanpham`.`ma_sp` = {$ma_sp}";
      if(mysqli_query($conn, $moSanPham)) {
            echo 1;
      } else {
            echo -1;
            exit();
      }