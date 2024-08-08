<?php
      $findProducts = null;
      $brand = null;
      if(isset($_GET['brand'])) {
            $brand = $_GET['brand'];
            $findProducts = mysqli_query($conn, "select * from `loaisanpham`, `sanpham` where loaisanpham.ten_loai_sp like '$brand' and sanpham.ma_loai_sp_khoa_ngoai = loaisanpham.ma_loai_sp");
            $quantityProducts = mysqli_num_rows($findProducts);
            if( $quantityProducts== 0) {
                  echo "Không tồn tại sản phẩm .$brand. nào !";
                  exit();
            }
      } else {
            $findProducts = mysqli_query($conn, "select * from `sanpham`, `loaisanpham` where sanpham.ma_loai_sp_khoa_ngoai = loaisanpham.ma_loai_sp");
            $quantityProducts = mysqli_num_rows($findProducts);
            if( $quantityProducts== 0) {
                  echo "Không tồn tại sản phẩm nào !";
                  exit();
            }
      } 
      
?>
<main>
      <div id="main-wrapper">
            <?php
                  //? nếu có page thì gán giá trị, nếu không có thì page = 1;
                  $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
                  $productsArrayPage = [];
                  $productsArray = [];
                  for($i = 0; $i < $quantityProducts; $i++) {
                        $productsArray[$i] = mysqli_fetch_array($findProducts);
                  }
                  for($i = ($page-1)*20; $i < $page*20; $i++) {
                        if($i >= count($productsArray)) 
                              break;
                        else 
                              $productsArrayPage[$i] = $productsArray[$i];
                  }
                  foreach($productsArrayPage as $row) {
                        // 
                        if($row['so_luong'] > 0 && $row['trang_thai_sp'] == 1) {
                              echo "<div class='product' onclick='openProductInfo(\"$row[ma_sp]\",\"$row[anh_sp]\",\"$row[ten_sp]\",\"$row[ten_loai_sp]\",\"$row[mo_ta]\", \"$row[gia_sp]\", \"$row[so_luong]\")'>
                              
                                          <div class='product-img'>
                                                <img src='$row[anh_sp]' alt='$row[ten_sp]'>
                                          </div>
                                          <div class='product-name'>
                                                $row[ten_sp]
                                          </div>
                                          <div class='product-price'>" 
                                                .currency_format((int)$row['gia_sp']).  //! Chú ý
                                          "</div>
                                    </div>";
                        }
                  }
            ?>
      </div>
      <div>
            <ul id="listPageNumber">
                  <?php
                        $quantityPageNumber = $quantityProducts / 20 + ($quantityProducts/20!=0?1:0);
                        for($i = 1; $i <= $quantityPageNumber; $i++) {
                              if($brand == null) {
                                    echo "<li><a href='http://localhost/HTTT_Project/index.php?page=$i'><button>$i</button></a></li>";
                              } else {
                                    echo "<li><a href='http://localhost/HTTT_Project/index.php?brand=$brand&page=$i'><button>$i</button></a></li>";
                              }
                        }
                  ?>
            </ul>
      </div>
</main>