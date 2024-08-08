
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Phone Store</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
      <link rel="shortcut icon" type="image/png" href="IMG/logo_wine_store_square.png">
      <link rel="stylesheet" href="CSS/style.css">
      <link rel="stylesheet" href="CSS/login_signin.css">
      <link rel="stylesheet" href="CSS/cart.css">
      <link rel="stylesheet" href="CSS/order.css">
      <link rel="stylesheet" href="CSS/product_info.css">
</head>
<body onload="checkLogin()">
      <header>
            <ul id="header-left">
                  <li><img src="IMG/logo_wine_store.png" alt="" class="logo"></li>
                  <li id="time-now"></li>
            </ul>
            
            <ul id="header-middle">
                  <?php
                        foreach(getDanhMucSanPham() as $danhMucSanPham) {
                              if($danhMucSanPham['ma_loai_sp'] == 1) 
                                    echo "<li><a href='http://localhost/HTTT_Project/index.php'><button class='typeWine'>$danhMucSanPham[ten_loai_sp]</button></a></li>";
                              else 
                                    echo "<li><a href='http://localhost/HTTT_Project/index.php?brand=$danhMucSanPham[ten_loai_sp]'><button class='typeWine'>$danhMucSanPham[ten_loai_sp]</button></a></li>";
                        }

                  ?>
            </ul>

            <ul id="header-right">
                  <!-- <li><i class="fa-solid fa-magnifying-glass"></i></li> -->
                  <li onclick="openLogin()"><i class="fa-solid fa-user"></i></li>
            </ul>
            <ul id="header-right-info">
                  <!-- <li id="tim-kiem"><i class="fa-solid fa-magnifying-glass"></i></li> -->
                  <li id="user-to-admin" style="display:none;"><button onclick="toAdmin()"><i class="fa-solid fa-gear"></i></button></li>
                  <li id="user-fullname"></li>
                  <li id="cart" onclick="openCart()"><i class="fa-solid fa-cart-shopping"></i></li>
                  <li onclick="logOut()" id="logOut"><i class="fa-solid fa-right-from-bracket"></i></li>
            </ul>
      </header>