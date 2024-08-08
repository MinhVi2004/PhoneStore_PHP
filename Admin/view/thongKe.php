<?php
      $thongKeTheoThang = null;
      $topSaleProduct = null;
      $thang = null;
      $nam = null;
      if(isset($_GET['month']) && isset($_GET['year'])) {
            $thang = $_GET['month'];
            $nam = $_GET['year'];
            $thongKeTheoThangQuery = mysqli_query($conn,"SELECT Sum(donhang.tong_gia_tri) AS tong_doanh_thu, count(*) as so_luong_don_hang FROM donhang WHERE MONTH(donhang.ngay_tao_don_hang) = {$thang} AND YEAR(donhang.ngay_tao_don_hang) = {$nam} and donhang.tinh_trang_don_hang = 2");

            //? Chọn top 5 sản phẩm bán chạy nhất trong tháng
            $topSaleProduct = mysqli_query($conn,"SELECT sp.ten_sp, SUM(ctdh.so_luong) AS so_luong_da_mua
            FROM 
                  chi_tiet_don_hang ctdh, donhang dh, sanpham sp
            where ctdh.ma_sp = sp.ma_sp and dh.ma_don_hang = ctdh.ma_don_hang 
            	and MONTH(dh.ngay_tao_don_hang) = {$thang} AND YEAR(dh.ngay_tao_don_hang) = {$nam}
                  and dh.tinh_trang_don_hang = 2
            GROUP BY 
                  sp.ten_sp
            ORDER BY 
                  so_luong_da_mua DESC
            Limit 5");

            $thongKeTheoThang = mysqli_fetch_array($thongKeTheoThangQuery);
      }
?>
<center><h1>Thống kê đơn hàng</h1></center>
<h3>Tháng : </h3>
<select name="month" id="thongKe-month">
      <?php
            if(isset($_GET['month']) && isset($_GET['year'])) {
                  for($i = 1; $i <= 12; $i++) {
                        if($_GET['month'] == $i) 
                              echo "<option value='$i' selected>$i</option>";
                        else 
                              echo "<option value='$i'>$i</option>";
                  }
            } else {
                  for($i = 1; $i <= 12; $i++) {
                        if(intval(date('m')) == $i) 
                              echo "<option value='$i' selected>$i</option>";
                        else 
                              echo "<option value='$i'>$i</option>";
                  }
            }
      ?>
</select>
<h3>Năm : </h3>
<select name="year" id="thongKe-year">
      <?php
            if(isset($_GET['month']) && isset($_GET['year'])) {
                  for($i = 1990; $i <= intval(date('Y')); $i++) {
                        if($_GET['year'] == $i) 
                              echo "<option value='$i' selected>$i</option>";
                        else 
                              echo "<option value='$i'>$i</option>";
                  }
            } else {
                  for($i = 1990; $i <= intval(date('Y')); $i++) {
                        if(intval(date('Y')) == $i) 
                              echo "<option value='$i' selected>$i</option>";
                        else 
                              echo "<option value='$i'>$i</option>";
                  }
            }
      ?>
</select>
<button style="width:200px;height:40px" onclick="thongKe()">Thống kê</button>

<?php
      if(isset($_GET['month']) && isset($_GET['year'])) {
            echo "<center><h1>Thống kê theo tháng</h1></center>";
            if($thongKeTheoThang != null) {
                  echo "<h3>Số lượng đơn hàng đã hoàn thành : {$thongKeTheoThang['so_luong_don_hang']} đơn hàng</h3>";
                  echo "<h3>Doanh thu tháng {$thang}/{$nam} : ".number_format($thongKeTheoThang['tong_doanh_thu'])." đ</h3>";
            }
            if(mysqli_num_rows($topSaleProduct) != 0) {
                  echo "<center><h1>Top 5 sản phẩm bán chạy theo tháng</h1></center>";
                  for($i = 1; $i <= mysqli_num_rows($topSaleProduct); $i++) {
                        $topSP = mysqli_fetch_array($topSaleProduct);
                        echo "<p>{$i}. {$topSP['ten_sp']} | {$topSP['so_luong_da_mua']} lượt mua</p>";
                  }
            }
      }
?>