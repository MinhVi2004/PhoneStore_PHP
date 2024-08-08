<?php
      $productList = mysqli_query($conn, "select * from sanpham, loaisanpham where sanpham.ma_loai_sp_khoa_ngoai = loaisanpham.ma_loai_sp");

?>
<table>
      <a href='http://localhost/HTTT_Project/Admin/index.php?controller=productDeleted'><button style="width:200px;height:50px">Sản phẩm đã khóa</button></a>
      <a href='http://localhost/HTTT_Project/Admin/index.php?controller=productCreate'><button style="width:200px;height:50px">Thêm sản phẩm mới</button></a>
      <a href='http://localhost/HTTT_Project/Admin/index.php?controller=productImport'><button style="width:200px;height:50px">Nhập hàng</button></a>
      <a href='http://localhost/HTTT_Project/Admin/index.php?controller=productImportList'><button style="width:200px;height:50px">Danh sách phiếu nhập</button></a>          
      <h1>Danh sách sản phẩm</h1>
      <thead>
            <tr>
            <th>Mã sp</th><th>Tên sp</th><th>Ảnh sp</th><th>Hãng</th><th>Giá</th><th>Số lượng còn lại</th><th>Mô tả</th><th>Tùy chọn</th>
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
                                    <td>$product[mo_ta]</td>
                                    <td><button onclick='khoaSanPham($product[ma_sp])'>Khóa sản phẩm</button><a href='http://localhost/HTTT_Project/Admin/index.php?controller=productChange&id=$product[ma_sp]'><button>Sửa</button></a></td>
                              </tr>";
                        }
                        }
            ?>
      </tbody>
</table>

