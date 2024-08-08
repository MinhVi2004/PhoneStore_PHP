<div id="cart-modal">
      <div id="cart-container">
            <button onclick="closeCart()" id="closeCart"><i class="fa-solid fa-x"></i></button>
            <h3 id="cart-title">Giỏ hàng</h3>
            <table id="cart-list-products-table-thead">
                  <thead>
                  <tr>
                  <th>Hình ảnh</th><th>Tên</th><th>Hãng</th><th>Giá</th><th>Số lượng</th><th>Thành tiền</th><th>Xóa</th>
                  </tr>
                  </thead>
            </table>
            <div id="cart-list-products">
                  <table id="cart-list-products-table">
                        <tbody id="cart-list-products-table-tbody">
                              <!-- JS ở đây -->
                        </tbody>
                  </table>
            </div>
            <div id="cart-options">
                  <span>Phương thức thanh toán : </span>
                  <select name="phuong-thuc-thanh-toan" id="cart-phuong-thuc-thanh-toan">
                        <option value="1">Tiền mặt</option>
                        <option value="2">Chuyển khoản</option>
                  </select>
                  <span>Tổng cộng : </span><span id="cart-total-bill"></span>
                  <button id="cart-buy" onclick="buy('controller/buy.php')">Đặt hàng</button>
                  <button id="cart-delete-all" onclick="cart_delete_all()">Xóa tất cả</button>
                  <button id="cart-order" onclick="openOrder(), order('controller/order.php')">Đơn hàng</button>
            </div>
      </div>
</div>