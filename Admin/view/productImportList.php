<?php
      $importList = mysqli_query($conn, "select * from phieunhap");
?>
<table id="import-table">
      <h1>Danh sách phiếu nhập</h1>
      <thead>
            <tr>
            <th>Mã phiếu</th><th>Ngày tạo phiếu</th><th>Tổng giá trị</th><th>Trạng thái</th><th>Tùy chọn</th>
            </tr>
      </thead>
      <tbody>
            <?php
                  while($Import = mysqli_fetch_array($importList)) {
                        $stringImport = "";
                        $stringImport .= "<tr>
                                    <td>$Import[MaPhieu]</td>
                                    <td>$Import[NgayTao]</td>
                                    <td>".number_format($Import['TongGiaTri'])." đ</td>
                                    <td>$Import[TrangThai]</td>";
                        $stringImport .= "<td><button onclick='openChiTietPhieuNhap($Import[MaPhieu])'>Chi tiết</button></td></tr>";
                        echo $stringImport;
                  }
            ?>
      </tbody>
</table>

