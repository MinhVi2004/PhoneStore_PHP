<?php
      include("connection.php");

      $maTaiKhoan = $_POST['maTaiKhoan'];

      $moTaiKhoan = "UPDATE `taikhoan` SET `trang_thai_tk` = '1' WHERE `taikhoan`.`ma_tk` = '{$maTaiKhoan}'";
      if(mysqli_query($conn, $moTaiKhoan)) {
            echo 1;
      } else {
            echo -1;
            exit();
      }