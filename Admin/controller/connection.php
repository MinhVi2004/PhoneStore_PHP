<?php
      $server_username = "root"; // thông tin đăng nhập host
      $server_password = ""; // mật khẩu, trong trường hợp này là trống
      $server_host = "localhost"; // host là localhost
      $name_database = "phonestore-mvi"; // database là website

      $conn = mysqli_connect($server_host,$server_username,$server_password,$name_database);
      if($conn) {
            //? Thiết lập kết nối ủa chúng ta khi truy vấn là dạng UTF8 trong trường hợp dữ liệu là tiếng việt có dâu
            mysqli_query($conn,"SET NAMES 'UTF8'");
      } else {
            echo "Kết nối CSDL thất bại !!";
      }
      return $conn;