<?php
      include("../lib/connection.php");

      $user = $_POST['user'];
      $orderQuery = "SELECT * FROM donhang where donhang.ma_tk = {$user['id']}";
      $result = mysqli_query($conn, $orderQuery);
      if(mysqli_num_rows($result) == 0) {
            echo 0;
            exit();
      }
      $orderList = array();
      while($row = mysqli_fetch_array($result)) {
            $_SESSION['order_ngay_tao_don_hang'] = $row['ngay_tao_don_hang'];
            $_SESSION['order_tong_gia_tri'] = $row['tong_gia_tri'];
            $_SESSION['order_phuong_thuc_thanh_toan'] = $row['phuong_thuc_thanh_toan'];
            $_SESSION['order_tinh_trang_don_hang'] = $row['tinh_trang_don_hang'];

            $orderTemp = array(
                  'order_ngay_tao_don_hang' => $_SESSION['order_ngay_tao_don_hang'],
                  'order_tong_gia_tri' =>$_SESSION['order_tong_gia_tri'],
                  'order_phuong_thuc_thanh_toan' =>$_SESSION['order_phuong_thuc_thanh_toan'],
                  'order_tinh_trang_don_hang' =>$_SESSION['order_tinh_trang_don_hang'],
            );
            $orderList[] = $orderTemp;
      }
      header('Content-Type: application/json');
      echo json_encode($orderList);