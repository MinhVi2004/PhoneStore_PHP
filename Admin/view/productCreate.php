<?php
      $typeProduct = mysqli_query($conn, "SELECT * FROM loaisanpham");
?>
<div id="productCreate">
            <h1>Thêm sản phẩm</h1>
            <h3>Tên sản phẩm : 
                  <input type="text" id="productCreate-ten-sp" value="" name="tenSp">
            </h3>
            <h3>Ảnh sản phẩm : 
                  <img id="productCreate-anh-sp-img" src="../IMG/logo_wine_store.jpg" alt="" style="width:200px">
                  <input type="text" id="productCreate-anh-sp" value="" onchange="setIMGProduct()" name="anhSp">
            </h3>
            <h3>Hãng :
                  <select id="productCreate-loai-sp" name="loaiSp">
                        <?php
                              while($loaiSp = mysqli_fetch_array($typeProduct)) 
                                    echo "<option value='$loaiSp[ma_loai_sp]'>$loaiSp[ten_loai_sp]</option>";
                              
                        ?>
                  </select>
            </h3>
            <h3>Giá sản phẩm :
                  <input type="text" id="productCreate-gia-sp" value="" name="giaSp">
            </h3>
            <h3>Mô tả :
                  <input type="text" id="productCreate-mo-ta-sp" wrap="on" value="" name="motaSp">
            </h3>
            <button onclick="createProduct()">Thêm sản phẩm</button>
</div>