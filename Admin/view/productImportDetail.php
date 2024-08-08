<?php
      $maPhieuNhap = $_GET['id'];
      $importDetail = mysqli_query($conn, "SELECT * FROM `ctpnk`, `sanpham` where ctpnk.MaSanPham = sanpham.ma_sp and ctpnk.MaPhieu = {$maPhieuNhap}");
      $import = mysqli_fetch_array($importDetail);
?>
<center><h1>Chi Tiết Phiếu Nhập</h1></center>
      
<table>
      <thead>
            <tr>
            <th>Mã sp</th><th>Tên sp</th><th>Ảnh sp</th><th>Hãng</th><th>Giá</th><th>Số lượng</th><th>Thành tiền</th>
            </tr>
      </thead>
      <tbody>
            <?php
                  while($row = mysqli_fetch_array($importDetail)) {
                        echo "<tr>
                              <td>$row[ma_sp]</td>
                              <td>$row[ten_sp]</td>
                              <td><img src='$row[anh_sp]'></td>
                              <td>$row[ma_loai_sp_khoa_ngoai]</td>
                              <td>".number_format($row['DonGia'])." đ</td>
                              <td>$row[SoLuong]</td>
                              <td>".number_format($row['ThanhTien'])." đ</td>
                        </tr>";
                  }
                        
            ?>
      </tbody>
</table>