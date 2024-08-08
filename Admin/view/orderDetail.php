<?php
      $maDonHang = $_GET['id'];
      $orderDetail = mysqli_query($conn, "SELECT * FROM donhang, sanpham, chi_tiet_don_hang, loaisanpham, taikhoan, nguoidung where loaisanpham.ma_loai_sp = sanpham.ma_loai_sp_khoa_ngoai and chi_tiet_don_hang.ma_don_hang = donhang.ma_don_hang and chi_tiet_don_hang.ma_sp = sanpham.ma_sp and donhang.ma_tk = taikhoan.ma_tk and taikhoan.ma_tk = nguoidung.ma_tk and donhang.ma_don_hang = {$maDonHang}");
      $userDetail = mysqli_query($conn, "SELECT * FROM donhang, taikhoan, nguoidung where donhang.ma_tk = taikhoan.ma_tk and taikhoan.ma_tk = nguoidung.ma_tk and donhang.ma_don_hang = {$maDonHang}");
      $user = mysqli_fetch_array($userDetail);
?>
<center><h1>Chi Tiết Đơn Hàng</h1></center>
      <h3>Họ tên : <?php echo $user['ho_ten']?></h3>      
      <h3>Số điện thoại : <?php echo $user['so_dien_thoai']?></h3>      
      <h3>Địa chỉ : <?php echo $user['dia_chi']?></h3>      
      <h3>Ngày đặt hàng : <?php echo $user['ngay_tao_don_hang']?></h3>
      <h3>Tình trạng đơn hàng : 
            <?php 
                  if($user['tinh_trang_don_hang'] == 0) {
                        echo "Chưa xác nhận";
                  } else if($user['tinh_trang_don_hang'] == 1) {
                        echo "Đã xác nhận";
                  } else if($user['tinh_trang_don_hang'] == 2) {
                        echo "Thành công";
                  } 
            ?>
      </h3>
      <h3>Phương thức thanh toán : 
            <?php if($user['phuong_thuc_thanh_toan'] == 1) {
                        echo "Tiền mặt";
                  } else if($user['phuong_thuc_thanh_toan'] == 2) {
                        echo "Chuyển khoản";
                  } 
            ?>
      </h3>

      
<table>
      <thead>
            <tr>
            <th>Mã sp</th><th>Tên sp</th><th>Ảnh sp</th><th>Hãng</th><th>Giá</th><th>Số lượng</th>
            </tr>
      </thead>
      <tbody>
            <?php
                  while($row = mysqli_fetch_array($orderDetail)) {
                        echo "<tr>
                              <td>$row[ma_sp]</td>
                              <td>$row[ten_sp]</td>
                              <td><img src='$row[anh_sp]'></td>
                              <td>$row[ten_loai_sp]</td>
                              <td>".number_format($row['gia_sp'])." đ</td>
                              <td>$row[so_luong]</td>
                        </tr>";
                  }
                        
            ?>
      </tbody>
</table>