setInterval(showTimeNow,1000);
function showTimeNow() {
      let time_now = document.getElementById('time-now');
      let date = new Date();
      /* let date_year = date.getFullYear();
      let date_month = date.getMonth() + 1;
      let date_day = date.getDate(); */
      let date_hour = date.getHours();
      if(date_hour < 10) {
            date_hour = date_hour.toString();
            date_hour = 0 + date_hour
      } else {
            date_hour = date_hour.toString();
      }
      let date_minute = date.getMinutes();
      if(date_minute < 10) {
            date_minute = date_minute.toString();
            date_minute = 0 + date_minute
      } else {
            date_minute = date_minute.toString();
      }
      let date_second = date.getSeconds();
      if(date_second < 10) {
            date_second = date_second.toString();
            date_second = 0 + date_second
      } else {
            date_second = date_second.toString();
      }
      let timeNowTemp = `${date_hour}:${date_minute}:${date_second}`;
      time_now.innerHTML = timeNowTemp;
}
function openLogin() {
      closeSignin();
      document.getElementById('login-email-error').style.display = 'none';
      document.getElementById('login-password-error').style.display = 'none';
      let login_modal = document.getElementById('login-modal');
      login_modal.style.display = 'block';
}
function openSignin() {
      closeLogin();
      document.getElementById('signin-fullname-error').style.display = 'none';
      document.getElementById('signin-email-error').style.display = 'none';
      document.getElementById('signin-phone-error').style.display = 'none';
      document.getElementById('signin-password-error').style.display = 'none';
      document.getElementById('signin-repassword-error').style.display = 'none';

      let signin_modal = document.getElementById('signin-modal');
      signin_modal.style.display = 'block';
}
function closeLogin() {
      let login_modal = document.getElementById('login-modal');
      login_modal.style.display = 'none';
}
function closeSignin() {
      let signin_modal = document.getElementById('signin-modal');
      signin_modal.style.display = 'none';
}
function toCurrency(num) {
      return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' đ';
}
//? -----------------------------------------------------------------------------------------------------------------------
//?                                                              Check Login
function checkLogin() {
      let header_right = document.getElementById('header-right');
      let header_right_info = document.getElementById('header-right-info');
      let data = JSON.parse(sessionStorage.getItem('userlogin'));
      if(!data) {
            header_right.style.display = 'flex';
            header_right_info.style.display = 'none';
            return false;
      } else {
            console.log(data.permission);
            if(data.permission == "User") {
                  showUser();
                  return true;
            } else if(data.permission == "Admin"){
                  showAdmin();
                  return true;
            } else {
                  console.log("Lỗi đăng nhập !");
            }
      }
}
function logOut() {
      if(confirm("Bạn có muốn đăng xuất ?")) {
            sessionStorage.removeItem('userlogin');
            if(window.location)
                  window.location.href = "http://localhost/HTTT_Project/index.php";
                  checkLogin();
      }
}
function showUser() {
      let header_right = document.getElementById('header-right');
      let header_right_info = document.getElementById('header-right-info');
      
      header_right.style.display = 'none';
      header_right_info.style.display = 'flex';
      
      let data = JSON.parse(sessionStorage.getItem('userlogin'));
      let fullname = document.getElementById('user-fullname');
      fullname.innerHTML = data.fullname;
}
function showAdmin() {
      let header_right = document.getElementById('header-right');
      let header_right_info = document.getElementById('header-right-info');
      
      header_right.style.display = 'none';
      header_right_info.style.display = 'flex';
      
      let data = JSON.parse(sessionStorage.getItem('userlogin'));
      let fullname = document.getElementById('user-fullname');
      if(data.permission == "Admin") {
            let gear = document.getElementById("user-to-admin");
            gear.style.display = 'block';
      }
      fullname.innerHTML = data.fullname;
}
function toAdmin() {
      window.location.href = "http://localhost/HTTT_Project/Admin/index.php?controller=user";
}
//! Product Info
function openProductInfo(masp, anh, ten, ten_loai, mo_ta, gia, so_luong_con_lai) {
      let productInfo_modal = document.getElementById("product-info-modal");
      productInfo_modal.style.display = 'block';

      let product_info_image = document.getElementById("product-info-image");
      let product_info_name = document.getElementById("product-info-name");
      let product_info_type = document.getElementById("product-info-type");
      let product_info_about = document.getElementById("product-info-about");
      let product_info_price = document.getElementById("product-info-price");
      let product_info_quantity = document.getElementById("product-info-quantity");
      let product_info_add = document.getElementById("product-info-add");

      product_info_image.innerHTML = "<img src='" +anh + "' alt='"+ten+"'>";
      product_info_name.innerHTML = ten;
      product_info_type.innerHTML = ten_loai;
      product_info_about.innerHTML = mo_ta;
      product_info_price.innerHTML = toCurrency(gia);
      product_info_quantity.innerHTML = "<button id='product-info-quantitydown' onclick='product_info_quantitydown()'>-</button><input type='text' value='1' id='user-page-quantity'>\<button id='product-info-quantityup' onclick='product_info_quantityup("+so_luong_con_lai+")'>+</button>";
      product_info_add.innerHTML = "<button id='product-info-add-button' onclick=\"addProductToCart('"+masp+"', '"+anh+"', '"+ten+"', '"+ten_loai+"', '"+mo_ta+"', '"+gia+"', '"+so_luong_con_lai+"')\">Thêm vào giỏ hàng</button>";
}
function closeProductInfo() {
      let productInfo_modal = document.getElementById("product-info-modal");
      productInfo_modal.style.display = 'none';
}
function product_info_quantitydown() {
      var quantity = document.getElementById('user-page-quantity');
      if(quantity.value != 1) {
            quantity.value--;
      }
}
function product_info_quantityup(so_luong) {
      var quantity = document.getElementById('user-page-quantity');
      if(quantity.value < so_luong) {
            quantity.value++;
      } else {
            alert("Vượt quá số lượng có sẵn !!")
      }
}
function addProductToCart(masp, anh, ten, ten_loai, mo_ta, gia, so_luong_con_lai){
      let soluong = document.getElementById('user-page-quantity').value;

      masp = parseInt(masp);
      gia = parseInt(gia);
      so_luong_con_lai = parseInt(so_luong_con_lai);
      soluong = parseInt(soluong);
      if(checkLogin()) {
            let data = JSON.parse(sessionStorage.getItem('cart'));
            if(data && data != []) {
                  //? Nếu có sản phẩm trong giỏ hàng thì tăng số lượng
                  for(let i = 0; i < data.length; i++) {
                        if(data[i].masp == masp) {
                              if((data[i].soluong + soluong) <= data[i].soluongconlai) {
                                    data[i].soluong += soluong;
                                    data[i].thanhtien += data[i].gia*soluong;
                                    sessionStorage.setItem('cart',JSON.stringify(data));
                                    alert("Thêm sản phẩm vào giỏ hàng thành công !");
                                    closeProductInfo();
                              } else {
                                    console.log('ok')
                                    alert("Vượt quá số lượng có sẵn !!");
                              }
                              return;
                        }
                  }
                  //? nếu không có trong giỏ hàng
                  if(soluong <= so_luong_con_lai) {
                        let cart = {
                              masp : masp,
                              anhsp : anh,
                              tensp : ten,
                              tenloaisp : ten_loai,
                              mota : mo_ta,
                              gia : gia,
                              soluong : soluong,
                              thanhtien : gia*soluong,
                              soluongconlai : so_luong_con_lai,
                        }
                        data.push(cart);
                        sessionStorage.setItem('cart',JSON.stringify(data));
                        alert("Thêm sản phẩm vào giỏ hàng thành công !")
                        closeProductInfo();
                  } else {
                        console.log('ok1')
                        alert("Vượt quá số lượng có sẵn !!")
                  }
                  
            } else {
                  if(soluong <= so_luong_con_lai) {
                        let cart = [{
                              masp : masp,
                              anhsp : anh,
                              tensp : ten,
                              tenloaisp : ten_loai,
                              mota : mo_ta,
                              gia : gia,
                              soluong : soluong,
                              thanhtien : gia*soluong,
                              soluongconlai : so_luong_con_lai,
                        }]
                        sessionStorage.setItem('cart',JSON.stringify(cart));
                        alert("Thêm sản phẩm vào giỏ hàng thành công !")
                        closeProductInfo();
                  } else {
                        console.log("oke3");
                        alert("Vượt quá số lượng có sẵn !!")
                  }
            }
      } else {
            alert("Vui lòng đăng nhập để mua hàng !");
            closeProductInfo();
            openLogin();
      }
}



