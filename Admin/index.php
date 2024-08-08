<?php
      include("../lib/connection.php");
      include("view/header.php");  

      $controller = $_GET['controller'];
      switch($controller) {
            case "user":
                  include("view/user.php");
                  break;
            case "product":
                  include("view/product.php");
                  break;
            case "productDeleted":
                  include("view/productDeleted.php");
                  break;
            case "productChange":
                  include("view/productChange.php");
                  break;
            case "productCreate":
                  include("view/productCreate.php");
                  break;
            case "productImport":
                  include("view/productImport.php");
                  break;
            case "order":
                  include("view/order.php");
                  break;
            case "orderDetail":
                  include("view/orderDetail.php");
                  break;
            case "productImportList":
                  include("view/productImportList.php");
                  break;
            case "productImportDetail":
                  include("view/productImportDetail.php");
                  break;
            case "thongKe":
                  include("view/thongKe.php");
                  break;
            default:

      }
      include("view/footer.php");