<?php
      include("connection.php");

      $maTaiKhoan = $_POST['maTaiKhoan'];

      $khoaTaiKhoan = "UPDATE `taikhoan` SET `trang_thai_tk` = '0' WHERE `taikhoan`.`ma_tk` = {$maTaiKhoan}";
      if(mysqli_query($conn, $khoaTaiKhoan)) {
            echo 1;
      } else {
            echo -1;
            exit();
      }