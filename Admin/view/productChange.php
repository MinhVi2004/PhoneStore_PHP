<?php
      $ma_sp = $_GET['id'];
      $product = mysqli_query($conn, "SELECT * FROM sanpham where sanpham.ma_sp = {$ma_sp}");
      $sp = mysqli_fetch_array($product);
      $typeProduct = mysqli_query($conn, "SELECT * FROM loaisanpham");
?>
<div id="product-change">
      <h1>Sửa thông tin sản phẩm</h1>
      <h3>Mã sản phẩm :
            <input type="text" id="product-ma-sp" disabled value="<?php echo "$sp[ma_sp]" ?>">
      </h3>
      <h3>Tên sản phẩm : 
            <input type="text" id="product-ten-sp" value="<?php echo "$sp[ten_sp]" ?>">
      </h3>
      <h3>Ảnh sản phẩm : 
            <img src="<?php echo "$sp[anh_sp]"?>" alt="" style="width:200px">
            <input type="text" id="product-anh-sp" value="<?php echo "$sp[anh_sp]" ?>">
      </h3>
      <h3>Hãng :
            <select name="loai-sp" id="product-loai-sp">
                  <?php
                        while($loaiSp = mysqli_fetch_array($typeProduct)) {
                              if($loaiSp["ma_loai_sp"] == $sp["ma_loai_sp_khoa_ngoai"])
                                    echo "<option value='$loaiSp[ma_loai_sp]' selected>$loaiSp[ten_loai_sp]</option>";
                              else 
                                    echo "<option value='$loaiSp[ma_loai_sp]'>$loaiSp[ten_loai_sp]</option>";
                        }
                  ?>
            </select>
      </h3>
      <h3>Giá sản phẩm :
            <input type="text" id="product-gia-sp" value="<?php echo "$sp[gia_sp]"?>" >
      </h3>
      <h3>Mô tả :
            <input type="text" id="product-mo-ta-sp" wrap="on" value="<?php echo "$sp[mo_ta]"?>">
      </h3>
      <button onclick="updateProduct()">Cập nhật thông tin sản phẩm</button>
</div>
<!-- C:\xampp\htdocs\HTTT_Project\IMG -->