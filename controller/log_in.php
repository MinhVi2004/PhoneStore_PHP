<?php
      include("../lib/connection.php");
      $login_email = $_POST["login_email"];
      $login_password = $_POST["login_password"];

      $findUser = mysqli_query($conn, "select * from taikhoan,nguoidung where email_tk = N'$login_email' and taikhoan.ma_tk = nguoidung.ma_tk");
      if(mysqli_num_rows($findUser) == 0) {
            echo -1;
            exit();
      }
      $user = mysqli_fetch_array($findUser);
      if($login_password == $user['mat_khau_tk']) {
            session_start();
            $_SESSION['user_id'] = $user['ma_tk'];
            $_SESSION['user_fullname'] = $user['ho_ten'];
            $_SESSION['user_email'] = $user['email_tk'];
            $_SESSION['user_password']=$user['mat_khau_tk'];
            $_SESSION['user_status']=$user['trang_thai_tk'];
            $_SESSION['user_phone']=$user['so_dien_thoai'];
            $_SESSION['user_address']=$user['dia_chi'];
            $_SESSION['user_permission']=$user['quyen_tk'];

            header('Content-Type: application/json');
            echo json_encode([
                  'user_id' => $_SESSION['user_id'],
                  'user_fullname' =>$_SESSION['user_fullname'],
                  'user_email' =>$_SESSION['user_email'],
                  'user_password' =>$_SESSION['user_password'],
                  'user_status' =>$_SESSION['user_status'],
                  'user_phone' =>$_SESSION['user_phone'],
                  'user_address' =>$_SESSION['user_address'],
                  'user_permission' =>$_SESSION['user_permission'],
            ]);
            exit();
      } else {
            echo 0;
            exit();
      }