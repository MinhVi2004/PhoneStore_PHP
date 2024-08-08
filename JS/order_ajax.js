
/*! Order Detail */
function openOrder() {
      console.log("open Order");
      closeCart();
      let modal_order = document.getElementById('order-modal');
      modal_order.style.display = 'block';
}

function closeOrder() {
      let modal_order = document.getElementById('order-modal');
      modal_order.style.display = 'none';
}

function order(linkXuLyPHP) {
      console.log("Xu ly ajax");
      let user = JSON.parse(sessionStorage.getItem('userlogin'));
      $.ajax({
            url: linkXuLyPHP,
            method: "POST",
            data: { 
                  user : user,
            },
            success : function(response){
                  if(response == -1) {
                        alert("Lỗi");
                  } else if(response == 0) {
                        console.log("khong co don hang nao");
                  } else if(response.length > 0) {
                        showOrderList(response);
                  }else {
                        alert("Lỗi khác");
                  }
            },
            error: function(xhr, status, error) {
                  console.error(xhr.responseText);
                  alert("Lỗi trong quá trình xử lý Ajax.");
            }
      });
}

function showOrderList(orderList){
      console.log("--- Show OrderList");
      let order_table = document.getElementById('order-table')
      order_table.innerHTML = "<thead><tr><th>Đơn hàng</th><th>Thời gian đặt hàng</th><th>Phương thức thanh toán</th><th>Tình trạng đơn hàng</th><th>Tổng giá trị</th></tr></thead>"; 
      let order_table_temp = "";
      for(let i = 0; i < orderList.length; i++) {
            order_table_temp += "<tr><td>"+(i+1)+"</td><td>"+orderList[i].order_ngay_tao_don_hang+"</td>";
            if(orderList[i].order_phuong_thuc_thanh_toan == 1) {
                  order_table_temp += "<td>Tiền mặt</td>";
            } else {
                  order_table_temp += "<td>Chuyển khoản</td>";
            }
            if(orderList[i].order_tinh_trang_don_hang == 0) {
                  order_table_temp += "<td style='color:red;'>Chưa xác nhận</td>";
            } else if(orderList[i].order_tinh_trang_don_hang == 1){
                  order_table_temp += "<td style='color:orange;'>Đã xác nhận</td>";
            } else {
                  order_table_temp += "<td style='color:green;'>Thành công</td>";
            }
            order_table_temp += "<td>"+toCurrency(orderList[i].order_tong_gia_tri)+"</td></tr>"
      }
      order_table.innerHTML += "<tbody>"+order_table_temp+"</tbody>";
}