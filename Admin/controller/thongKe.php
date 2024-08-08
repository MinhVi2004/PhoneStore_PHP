<?php
      include("connection.php");

      $thang = $_POST['month'];
      $nam = $_POST['year'];
      $thongKeTheoThang = "SELECT Sum(donhang.tong_gia_tri) AS total_doanh_thu, count(*) as so_luong_don_hang
      FROM donhang
      WHERE MONTH(donhang.ngay_tao_don_hang) = {$thang} AND YEAR(donhang.ngay_tao_don_hang) = {$nam}";
      if(mysqli_query($conn, $thongKeTheoThang)) {
            echo 1;
      } else {
            echo -1;
            exit();
      }