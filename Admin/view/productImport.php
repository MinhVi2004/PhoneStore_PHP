<?php
      $productList = mysqli_query($conn, "select * from sanpham, loaisanpham where sanpham.ma_loai_sp_khoa_ngoai = loaisanpham.ma_loai_sp");
      $importBillList = mysqli_query($conn, "select * from phieunhap, ctpnk, sanpham, loaisanpham where phieunhap.TrangThai = 'DangTao' and ctpnk.MaPhieu = phieunhap.MaPhieu and ctpnk.MaSanPham = sanpham.ma_sp and loaisanpham.ma_loai_sp = sanpham.ma_loai_sp_khoa_ngoai");
?>
<div>
      
      <h1>Phiếu nhập hàng đang tạo</h1>
      <table>
            <thead>
                  <tr>
                  <th>Mã sp</th><th>Tên sp</th><th>Ảnh sp</th><th>Hãng</th><th>Giá</th><th>Số lượng nhập</th><th>Xóa</th>
                  </tr>
            </thead>
            <tbody id="importProduct-table-body">
                  <?php
                        $tongGiaTri = 0;
                        $maPhieu = 0;
                        while($importBill = mysqli_fetch_array($importBillList)) {
                              $tongGiaTri = $importBill['TongGiaTri'];
                              $maPhieu = $importBill['MaPhieu'];
                              echo "<tr>
                                    <td>$importBill[ma_sp]</td>
                                    <td>$importBill[ten_sp]</td>
                                    <td><img src='$importBill[anh_sp]'></td>
                                    <td>$importBill[ten_loai_sp]</td>
                                    <td>".number_format($importBill['gia_sp'])." đ</td>
                                    <td>$importBill[SoLuong]</td>
                                    <td><button>X</button></td>
                              </tr>";
                        }
                  ?>
            </tbody>
      </table>
      <h3>Tổng giá trị : 
            <?php 
                  echo number_format($tongGiaTri) . "đ";
            ?>
      </h3>
      <button style="width:150px;height:50px;cursor:pointer;" onclick="completeImportBill(<?php echo $maPhieu?>)">Nhập hàng</button>
      <h1>Danh sách sản phẩm</h1>
      <table>
            <thead>
                  <tr>
                  <th>Mã sp</th><th>Tên sp</th><th>Ảnh sp</th><th>Hãng</th><th>Giá</th><th>Số lượng còn lại</th><th>Tùy chọn</th>
                  </tr>
            </thead>
            <tbody>
                  <?php
                        while($product = mysqli_fetch_array($productList)) {
                              if($product['trang_thai_sp'] == 1) {
                                    echo "<tr>
                                          <td>$product[ma_sp]</td>
                                          <td>$product[ten_sp]</td>
                                          <td><img src='$product[anh_sp]'></td>
                                          <td>$product[ten_loai_sp]</td>
                                          <td>".number_format($product['gia_sp'])." đ</td>
                                          <td>$product[so_luong]</td>
                                          <td><button onclick='importProduct($product[ma_sp])'>Nhập hàng</button></td>
                                    </tr>";
                              }
                        }
                  ?>
            </tbody>
      </table>
</div>

