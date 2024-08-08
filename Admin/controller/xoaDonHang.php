<?php
      include("connection.php");

      $maDonHang = $_POST['maDonHang'];
      $xoaDonHang = "DELETE FROM donhang WHERE `donhang`.`ma_don_hang` = '{$maDonHang}'";
      if(mysqli_query($conn, $xoaDonHang)) {
            echo 1;
      } else {
            echo -1;
            exit();
      }