<?php
      include("connection.php");

      $maPhieu = $_POST['maPhieu'];
      $xacNhanTaoPhieuNhap = "UPDATE `phieunhap` SET `TrangThai` = 'DaTao' WHERE `phieunhap`.`MaPhieu` = {$maPhieu};";
      
      if(!mysqli_query($conn, $xacNhanTaoPhieuNhap)) {
            echo -1;
      }
      
      $ctpnkList = mysqli_query($conn, "SELECT * FROM `ctpnk`");
      while($ctpnk = mysqli_fetch_array($ctpnkList)) {
            //? LẤY SẢN PHẨM
            $sp = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `sanpham` where sanpham.ma_sp = {$ctpnk['MaSanPham']}"));
            //? CẬP NHẬT SỐ LƯỢNG CÒN LẠI CỦA SẢN PHẨM
            $soLuong = $sp['so_luong'] + $ctpnk['SoLuong'];

            mysqli_query($conn, "UPDATE `sanpham` SET `so_luong` = '{$soLuong}' WHERE `sanpham`.`ma_sp` = $ctpnk[MaSanPham]");
      }
      echo 1;