
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Wine Store</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
      <link rel="shortcut icon" type="image/png" href="../IMG/logo_wine_store_square.png">
      <link rel="stylesheet" href="CSS/style.css">
      <link rel="stylesheet" href="CSS/order.css">
      <link rel="stylesheet" href="CSS/user.css">
      <link rel="stylesheet" href="CSS/product.css">
</head>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    td {
        text-align: center; /* Căn giữa theo chiều ngang */
        vertical-align: middle; /* Căn giữa theo chiều dọc */
        border: 1px solid #000; /* Đường viền */
        padding: 10px; /* Khoảng cách giữa nội dung và đường viền */
    }
</style>
<body>
      <header>
            <ul id="header-left">
                  <li><img src="../IMG/logo_wine_store.png" alt="" class="logo"></li>
            </ul>
            
            <ul id="header-middle">
                        <li><a href='http://localhost/HTTT_Project/Admin/index.php?controller=user'><button>Tài khoản</button></a></li>
                        <li><a href='http://localhost/HTTT_Project/Admin/index.php?controller=product'><button>Sản phẩm</button></a></li>
                        <li><a href='http://localhost/HTTT_Project/Admin/index.php?controller=order'><button>Đơn hàng</button></a></li>
                        <li><a href='http://localhost/HTTT_Project/Admin/index.php?controller=thongKe'><button>Thống kê</button></a></li>
            </ul>

            <div id="header-right">
                  <h2>Admin</h2>
                  <button onclick="logOut()"id="logOut">Đăng xuất <i class="fa-solid fa-right-from-bracket"></i></button>
            </div>
      </header>
      <main>