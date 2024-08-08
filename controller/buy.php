<?php
      include("../lib/connection.php");

      $user = $_POST["user"];
      $cart = $_POST["cart"];
      $danhSachSoLuong = array();
      $soLuongSanPham = $_POST["soLuongSanPham"];
      $tongGiaTri = $_POST["tongGiaTri"];

      //? Add giá trị
      $phuongThucThanhToan = $_POST["phuongThucThanhToan"];
      $tinhTrangDonHang = 0;
      
      //?Thêm đơn hàng
      //* INSERT INTO `donhang` (`ma_don_hang`, `ngay_tao_don_hang`, `tong_gia_tri`, `ma_tk`, `phuong_thuc_thanh_toan`, `tinh_trang_don_hang`) VALUES (NULL, '2024-04-08 13:54:55.000000', '15832000', '1', '1', '0');
      $themDonHangQuery = "INSERT INTO donhang(ma_don_hang, ngay_tao_don_hang, tong_gia_tri, ma_tk, phuong_thuc_thanh_toan, tinh_trang_don_hang) VALUES (null, now(), '$tongGiaTri', '$user[id]', '$phuongThucThanhToan', '$tinhTrangDonHang')";
      if(mysqli_query($conn, $themDonHangQuery)) {
            $last_id = mysqli_insert_id($conn);//? Mã đơn hàng vừa tạo
      } else {
            echo -1;//? Thất bại quá trình tạo Đơn hàng
            exit();
      }
      
      for($i = 0; $i < $soLuongSanPham; $i++) {
            //? Tạo chi tiết đơn hàng
            //* INSERT INTO `chi_tiet_don_hang` (`don_gia`, `so_luong`, `thanh_tien`, `ma_don_hang`, `ma_sp`) VALUES ('3958000', '4', '15832000', '3', '1');
            $themChiTietDonHangQuery = "INSERT INTO chi_tiet_don_hang (don_gia, so_luong, thanh_tien, ma_don_hang, ma_sp) VALUES ('{$cart[$i]['gia']}', '{$cart[$i]['soluong']}', '{$cart[$i]['thanhtien']}', $last_id, '{$cart[$i]['masp']}');";
            if(!mysqli_query($conn, $themChiTietDonHangQuery)) {
                  echo -1;//? Thất bại quá trình tạo Đơn hàng
                  exit();
            }
            //? lấy số lượng sản phẩm $i
            $laySoLuongQuery = "Select * from sanpham where ma_sp =  {$cart[$i]['masp']}";
            $soLuong = 0; //? số lượng cần set
            if($result = mysqli_query($conn,$laySoLuongQuery)) {
                  $row = mysqli_fetch_assoc($result);
                  $soLuong = $row["so_luong"] - $cart[$i]["soluong"];
            } else {
                  echo -1;//? Thất bại quá trình tạo Đơn hàng
                  exit();
            }
            //?Update số lượng sản phẩm
            $capNhatSoLuongQuery =  "UPDATE sanpham SET so_luong = $soLuong WHERE sanpham.ma_sp =  '{$cart[$i]['masp']}'";
            if(!mysqli_query($conn, $capNhatSoLuongQuery)) {
                  echo -1;//? Thất bại quá trình tạo Đơn hàng
                  exit();
            }
      }

      echo 1; //? Thành công quá trình tạo Đơn hàng
      exit();


      // echo $cart[1]['masp'];
      // echo $user['id'];