<?php
      include("userDetail.php");
      $userList = mysqli_query($conn, "select * from taikhoan");
?>
<table>
      <h1>Danh sách tài khoản người dùng</h1>
      <thead>
            <tr>
            <th>ID</th><th>Email</th><th>Mật Khẩu</th><th>Trạng Thái</th><th>Ngày Tạo</th><th>Quyền</th><th>Tùy chọn</th>
            </tr>
      </thead>
      <tbody>
            <?php
                  while($user = mysqli_fetch_array($userList)) {
                        if($user['quyen_tk'] != "Admin") {
                              echo "<tr>
                                    <td>$user[ma_tk]</td>
                                    <td>$user[email_tk]</td>
                                    <td>$user[mat_khau_tk]</td>
                                    <td>".(($user['trang_thai_tk']==1)?'Bình thường':'Bị khóa')."</td>
                                    <td>$user[ngay_tao_tk]</td>
                                    <td>$user[quyen_tk]</td>
                                    <td><button onclick='openUserDetail($user[ma_tk])'>Chi Tiết</button></td>
                              </tr>";
                        }
                        } 
                        
            ?>
      </tbody>
</table>


