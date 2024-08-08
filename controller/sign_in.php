<?php
      include("../lib/connection.php");
      //? lấy thông tin từ các form bằng phương thức POST
      
      $signin_fullname = trim($_POST["signin_fullname"]);
      $signin_phone = trim($_POST["signin_phone"]);
      $signin_email = trim($_POST["signin_email"]);
      $signin_password = trim($_POST["signin_password"]);
      $signin_address = trim($_POST["signin_address"]);

      $findUserbyEmail = mysqli_query($conn, "select * from taikhoan where email_tk = N'$signin_email'");
      if(mysqli_num_rows($findUserbyEmail) == 0) {
                  $themTK = "INSERT INTO taikhoan(ma_tk, email_tk, mat_khau_tk, trang_thai_tk, ngay_tao_tk, quyen_tk) VALUES (null, '$signin_email', '$signin_password', '1',now(), '1')";
                  mysqli_query($conn, $themTK);
                  $last_id = mysqli_insert_id($conn);
                  //Lấy id vừa tạo
                  $themThongTin = "INSERT INTO nguoidung(ma_tk, ho_ten, so_dien_thoai, dia_chi) VALUES ('$last_id', '$signin_fullname', '$signin_phone', '$signin_address')";
                  mysqli_query($conn, $themThongTin);
                  // Cập nhật ID mới vào bảng
                  $conn->close();
                  echo 1;
                  exit();
      } else {
            echo -1;
            exit();
      }