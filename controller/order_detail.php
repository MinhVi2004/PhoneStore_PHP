<?php
      include("../lib/connection.php");

      $user = $_POST['user'];
      $orderDetailQuery = "SELECT * FROM donhang, sanpham, taikhoan, chi_tiet_don_hang, nguoidung, loaisanpham where loaisanpham.ma_loai_sp = sanpham.ma_loai_sp_khoa_ngoai and donhang.ma_tk = taikhoan.ma_tk and chi_tiet_don_hang.ma_don_hang = donhang.ma_don_hang and chi_tiet_don_hang.ma_sp = sanpham.ma_sp and nguoidung.ma_tk = taikhoan.ma_tk and taikhoan.ma_tk = {$user['id']}";
      $result = mysqli_query($conn, $orderDetailQuery);
      if(mysqli_num_rows($result) == 0) {
            echo -1;
            exit();
      }
      session_start();
      $orderDetailList = array();
      while($row = mysqli_fetch_assoc($result)) {
            $orderTemp = array(

            );
            $_SESSION['order_detail_anh_sp'] = $row['anh_sp'];
            $_SESSION['order_detail_ten_so'] = $row['ten_sp'];
            $_SESSION['order_detail_ten_loai_sp'] = $row['ten_loai_sp'];
            $_SESSION['order_detail_password']=$row['mat_khau_tk'];
            $_SESSION['order_detail_phone']=$row['so_dien_thoai'];
            $_SESSION['order_detail_address']=$row['dia_chi'];
            $_SESSION['order_detail_permission']=$row['quyen_tk'];

            header('Content-Type: application/json');
            echo json_encode([
                  'order_detail_id' => $_SESSION['order_detail_id'],
                  'order_detail_fullname' =>$_SESSION['order_detail_fullname'],
                  'order_detail_email' =>$_SESSION['order_detail_email'],
                  'order_detail_password' =>$_SESSION['order_detail_password'],
                  'order_detail_phone' =>$_SESSION['order_detail_phone'],
                  'order_detail_address' =>$_SESSION['order_detail_address'],
                  'order_detail_permission' =>$_SESSION['order_detail_permission'],
            ]);
            exit();
      }