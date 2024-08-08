<?php
      include("connection.php");

      $maSp = $_POST['maSp'];
      $soLuongNhap = $_POST['soLuongNhap'];

      $findProduct = "select * from sanpham where sanpham.ma_sp = {$maSp}";
      $product = mysqli_query($conn, $findProduct);
      if(mysqli_num_rows($product) == 0) {
            echo -1;
            return;
      }
      $sp = mysqli_fetch_array($product);
      $thanhTien = $sp['gia_sp'] * $soLuongNhap;
      //? Tìm phiếu nhập đang tạo
      $findImportBill = mysqli_query($conn, "SELECT * from phieunhap where phieunhap.TrangThai = 'DangTao'");

      if(mysqli_num_rows($findImportBill) == 0) { //? nếu phieunhap chưa có sản phẩm nào
            //? THÌ TẠO PHIẾU NHẬP
            $newImportBill = mysqli_query($conn, "INSERT INTO `phieunhap` (`TongGiaTri`, `NgayTao`, `TrangThai`) VALUES ('{$thanhTien}', now(), 'DangTao')");

            $findImportBillTemp = mysqli_query($conn, "SELECT * from phieunhap where phieunhap.TrangThai = 'DangTao'");
            $importBill = mysqli_fetch_array($findImportBillTemp);
            //? VÀ THÊM CHI TIẾT PHIẾU NHẬP VÀO PHIẾU
            $themSanPhamVaoPhieuNhap = mysqli_query($conn, "INSERT INTO `ctpnk` (`MaPhieu`, `MaSanPham`, `DonGia`, `SoLuong`, `ThanhTien`) VALUES ('{$importBill['MaPhieu']}', '{$sp['ma_sp']}', '{$sp['gia_sp']}', '{$soLuongNhap}', '{$thanhTien}')");
            echo 1;
      } else {
            //? LẤY PHIẾU NHẬP
            $importBill = mysqli_fetch_array($findImportBill);
            $tongGiaTri = $importBill['TongGiaTri'];
            //? VÀ THÊM CHI TIẾT PHIẾU NHẬP VÀO PHIẾU
            $themSanPhamVaoPhieuNhap = mysqli_query($conn, "INSERT INTO `ctpnk` (`MaPhieu`, `MaSanPham`, `DonGia`, `SoLuong`, `ThanhTien`) VALUES ('{$importBill['MaPhieu']}', '{$sp['ma_sp']}', '{$sp['gia_sp']}', '{$soLuongNhap}', '{$thanhTien}')");
            $tongGiaTri += $thanhTien;
            //? CẬP NHẬT TỔNG GIÁ TRỊ PHIẾU NHẬP
            $capNhatTongGiaTri = mysqli_query($conn,"UPDATE `phieunhap` SET `TongGiaTri` = '{$tongGiaTri}' WHERE `phieunhap`.`MaPhieu` = {$importBill['MaPhieu']};");
            echo 1;
      }
      