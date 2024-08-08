<?php
      $productList = mysqli_query($conn, "select * from sanpham");
?>
<table>
      <h1>Danh sách sản phẩm đã xóa</h1>
      <thead>
            <tr>
            <th>Mã sp</th><th>Tên sp</th><th>Ảnh sp</th><th>Mã loại sp</th><th>Giá</th><th>Số lượng còn lại</th><th>Mô tả</th><th>Tùy chọn</th>
            </tr>
      </thead>
      <tbody>
            <?php
                  while($product = mysqli_fetch_array($productList)) {
                        if($product['trang_thai_sp'] == 0) {
                              echo "<tr>
                                    <td>$product[ma_sp]</td>
                                    <td>$product[ten_sp]</td>
                                    <td><img src='$product[anh_sp]'></td>
                                    <td>$product[ma_loai_sp_khoa_ngoai]</td>
                                    <td>".number_format($product['gia_sp'])." đ</td>
                                    <td>$product[so_luong]</td>
                                    <td>$product[mo_ta]</td>
                                    <td><button onclick='moSanPham($product[ma_sp])'>Mở sản phẩm</button><button>Sửa</button><button>Chi Tiết</button></td>
                              </tr>";
                        }
                        }
            ?>
      </tbody>
</table>

