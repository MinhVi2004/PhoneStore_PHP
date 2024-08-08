<?php
      $orderList = mysqli_query($conn, "select * from donhang");
?>
<table id="order-table">
      <h1>Danh sách đơn hàng</h1>
      <thead>
            <tr>
            <th>Mã order</th><th>Ngày tạo order</th><th>Tổng giá trị</th><th>Mã tài khoản</th><th>Phương thức thanh toán</th><th>Tình trạng đơn hàng</th><th>Tùy chọn</th>
            </tr>
      </thead>
      <tbody>
            <?php
                  while($order = mysqli_fetch_array($orderList)) {
                        $stringOrder = "";
                        $stringOrder .= "<tr>
                                    <td>$order[ma_don_hang]</td>
                                    <td>$order[ngay_tao_don_hang]</td>
                                    <td>".number_format($order['tong_gia_tri'])." đ</td>
                                    <td>$order[ma_tk]</td>";
                        if($order['phuong_thuc_thanh_toan']== 1) {
                              $stringOrder .= "<td>Tiền mặt</td>";
                        } else {
                              $stringOrder .="<td>Chuyển khoản</td>";
                        }
                        if($order['tinh_trang_don_hang'] == 0) {
                              $stringOrder .= "<td class='tinh_trang_don_hang' onclick='thayDoiTinhTrangDonHang($order[ma_don_hang],1)' style='color:red' value='0'>Chưa xác nhận</td>";
                        } else if($order['tinh_trang_don_hang'] == 1) {
                              $stringOrder .="<td class='tinh_trang_don_hang' onclick='thayDoiTinhTrangDonHang($order[ma_don_hang],2)' style='color:orange' value='1'>Đã xác nhận</td>";
                        } else {
                              $stringOrder .="<td class='tinh_trang_don_hang' onclick='thayDoiTinhTrangDonHang($order[ma_don_hang],0)' style='color:green' value='2'>Thành công</td>";
                        }
                        $stringOrder .= "<td><button onclick='xoaDonHang($order[ma_don_hang])'>Xóa</button><button onclick='openChiTietDonHang($order[ma_don_hang])'>Chi tiết</button></td></tr>";
                        echo $stringOrder;
                  }
            ?>
      </tbody>
</table>

