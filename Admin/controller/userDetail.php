<?php
      include("connection.php");

      $maTaiKhoan = $_POST['maTaiKhoan'];
      $chiTietKhachHang = "";
      $findUserDetail = mysqli_query($conn, "SELECT * FROM `taikhoan`, `nguoidung` WHERE nguoidung.ma_tk = taikhoan.ma_tk and taikhoan.ma_tk = {$maTaiKhoan}");
      if(mysqli_num_rows($findUserDetail) == 0) {
            echo -1;
            exit();
      }
      $user = mysqli_fetch_assoc($findUserDetail);
      header('Content-Type: application/json');
      echo json_encode([
            'user_ma' => $user['ma_tk'],
            'user_ho_ten' =>$user['ho_ten'],
            'user_email' =>$user['email_tk'],
            'user_mat_khau' =>$user['mat_khau_tk'],
            'user_trang_thai' =>$user['trang_thai_tk'],
            'user_so_dien_thoai' =>$user['so_dien_thoai'],
            'user_dia_chi' =>$user['dia_chi'],
            'user_quyen' =>$user['quyen_tk'],
            'user_ngay_tao' =>$user['ngay_tao_tk'],
      ]);
      