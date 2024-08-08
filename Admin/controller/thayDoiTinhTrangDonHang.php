<?php
      include("connection.php");

      $maDonHang = $_POST['maDonHang'];
      $tinhTrangDonHangTiepTheo = $_POST['tinhTrangDonHangTiepTheo'];
      $thayDoiTinhTrangDonHang = "UPDATE `donhang` SET `tinh_trang_don_hang` = '{$tinhTrangDonHangTiepTheo}' WHERE `donhang`.`ma_don_hang` = '{$maDonHang}'";
      if(mysqli_query($conn, $thayDoiTinhTrangDonHang)) {
            echo 1;
      } else {
            echo -1;
            exit();
      }