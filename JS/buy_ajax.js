function buy (linkXuLyPHP) {
      let user = JSON.parse(sessionStorage.getItem('userlogin'));
      let data = JSON.parse(sessionStorage.getItem('cart'));
      let phuongThucThanhToan = document.getElementById('cart-phuong-thuc-thanh-toan').value;
      if(!data && data == []) {
            alert("Vui lòng chọn 1 sản phẩm !");
            return false;      
      }
      let tongGiaTri = 0;
      let soLuongSanPham = 0;
      data.forEach(sp => {
            soLuongSanPham++;
            tongGiaTri += sp.thanhtien;
      });
      if(validateLogin() == true) {
            $.ajax({
                  url: linkXuLyPHP,
                  method: "POST",
                  data: { 
                        user : user,
                        cart : data,
                        soLuongSanPham : soLuongSanPham,
                        tongGiaTri : tongGiaTri,
                        phuongThucThanhToan : phuongThucThanhToan,
                  },
                  success : function(response){
                        if(response == "1") {
                              alert("Đặt hàng thành công !");
                              sessionStorage.removeItem("cart");
                              showCartProducts();
                        } else if(response == "-1") {
                              alert("Đặt hàng thất bại !");
                        } else {
                              console.log(response);
                              alert("Lỗi khác !");
                        } 
                  },
                  error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert("Lỗi trong quá trình xử lý Ajax.");
                  }
            });
      } else 
            return false;
      
}