<?php
function currency_format($number, $suffix = 'đ') {
      if (!empty($number)) {
          return number_format($number, 0, ',', '.') . "{$suffix}";
      }
}
function getDanhMucSanPham() {
    //? Khai báo biến toàn cục $conn
    global $conn;

    $findTypeWine = mysqli_query($conn, "select * from `loaisanpham` ORDER BY `ma_loai_sp` ASC");
    $quantityTypeWine = mysqli_num_rows($findTypeWine);
    if( $quantityTypeWine== 0) {
        echo "Không tồn tại loại điện thoại nào !";
        exit();
    }
    $typeWineArray = [];
    for($i = 0; $i < $quantityTypeWine; $i++) {
            $typeWineArray[$i] = mysqli_fetch_array($findTypeWine);
    }
    return $typeWineArray;
}