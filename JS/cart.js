

function openCart() {
      let cart_modal = document.getElementById('cart-modal');
      if(cart_modal.style.display == 'none' || cart_modal.style.display == '') 
            cart_modal.style.display = 'block';
      showCartProducts();
}
function closeCart() {
      let cart_modal = document.getElementById('cart-modal');
      if(cart_modal.style.display !== 'none'){
            cart_modal.style.display = 'none';
      }
}
function showCartProducts() {
      let data = JSON.parse(sessionStorage.getItem("cart"));
      let table = document.getElementById("cart-list-products-table-tbody");
      table.innerHTML = "";
      if(data && data != []) {
            data.forEach(sp => {
                  let thanhTien = sp.soluong * sp.gia;
                  table.innerHTML += "<tr><td><img src="+sp.anhsp+"></td><td>"+sp.tensp+"</td><td>"+sp.tenloaisp+"</td><td>"+toCurrency(sp.gia)+"</td><td><button id='cart-quantitydown' onclick='cart_quantitydown("+sp.masp+")'>-</button><input type='text' value='"+sp.soluong+"' id='cart-quantity'>\<button id='cart-quantityup' onclick='cart_quantityup("+sp.masp+")'>+</button></td><td>"+toCurrency(thanhTien)+"</td><td><button id='cart-product-delete' onclick='cart_delete("+sp.masp+")'>x</button></td></tr>"
            });
      }
      cart_total_bill();
}
function cart_quantitydown(masp) {
      let data = JSON.parse(sessionStorage.getItem("cart"));
      for(let i = 0; i < data.length; i++) {
            if(data[i].masp == masp) {
                  if(data[i].soluong > 1) {
                        data[i].soluong--;
                        data[i].thanhtien -= data[i].gia;
                        break;
                  } else if(data[i].soluong == 1) {
                        cart_delete(masp);
                        break;
                  }
            }
      }
      sessionStorage.setItem('cart', JSON.stringify(data));
      showCartProducts();
}
function cart_quantityup(masp) {
      let data = JSON.parse(sessionStorage.getItem("cart"));
      for(let i = 0; i < data.length; i++) {
            if(data[i].masp == masp) {
                  if(data[i].soluong < data[i].soluongconlai) {
                        data[i].soluong++;
                        data[i].thanhtien += data[i].gia;
                  } else {
                        alert("Vượt quá số lượng có sẵn !!")
                  }
                  break;
            }
      }
      sessionStorage.setItem('cart', JSON.stringify(data));
      showCartProducts();
}
function cart_total_bill() {
      let data = JSON.parse(sessionStorage.getItem("cart"));
      let totalBill = document.getElementById("cart-total-bill");
      totalBill.innerHTML = "";
      let total = 0;
      if(data && data!= []) {
            for(let i = 0; i < data.length; i++)
            total+=data[i].thanhtien;
      }
      totalBill.innerHTML = toCurrency(total);
}
function cart_delete(masp) {
      if(confirm("Bạn có muốn xóa sản phẩm này ?")==true) {
            let data = JSON.parse(sessionStorage.getItem("cart"));
            for(let i = 0; i < data.length; i++) {
                  if(data[i].masp == masp) {
                        data.splice(i,1);
                        break;
                  }
            }
            sessionStorage.setItem('cart', JSON.stringify(data));
            showCartProducts();
      }
}
function cart_delete_all() {
      if(confirm("Bạn có muốn xóa hết sản phẩm trong giỏ hàng ?")) {
            sessionStorage.removeItem("cart");
            showCartProducts();
      }
}