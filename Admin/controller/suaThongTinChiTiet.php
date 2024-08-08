<?php
      include("connection.php");

      $ma_tk = $_POST['ma_tk'];
      $ho_ten = $_POST['ho_ten'];
      $so_dien_thoai = $_POST['so_dien_thoai'];
      $dia_chi = $_POST['dia_chi'];
      $email = $_POST['email'];
      $mat_khau = $_POST['mat_khau'];
      $quyen = $_POST['quyen'];
      $trang_thai = $_POST['trang_thai'];

      $thayDoiThongTinTaiKhoan = "UPDATE `taikhoan` SET `email_tk` = '{$email}', `mat_khau_tk` = '{$mat_khau}', `trang_thai_tk` = '{$trang_thai}', `quyen_tk` = '{$quyen}' WHERE `taikhoan`.`ma_tk` = '{$ma_tk}'";
      $thayDoiThongTinNguoiDung = "UPDATE `nguoidung` SET `ho_ten` = '{$ho_ten}', `so_dien_thoai` = '{$so_dien_thoai}', `dia_chi` = '{$dia_chi}' WHERE `nguoidung`.`ma_tk` = '{$ma_tk}'";
      if(mysqli_query($conn, $thayDoiThongTinTaiKhoan) && mysqli_query($conn, $thayDoiThongTinNguoiDung)) {
            echo 1;
      } else {
            echo -1;
            exit();
      }