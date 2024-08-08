
<div id="user-change-modal">
      <div id="user-change-container">
            <!--Dùng js để thêm nội dung-->
            <button onclick="closeUserChange()" id="closeUserChange"><i class="fa-solid fa-x"></i></button>
            <h3 id="user-change-title">Sửa thông tin chi tiết khách hàng</h3>
            <div id="user-change">
                  <p>Mã tài khoản : <span id="user-change-ma"></span></p>
                  <p>Họ và tên : <input type="text" id="user-change-ho-ten"></p>
                  <p>Số điện thoại : <input type="text" id="user-change-so-dien-thoai"></p>
                  <p>Địa chỉ : <input type="text" id="user-change-dia-chi"></p>
                  <p>Email : <input type="text" id="user-change-email"></p>
                  <p>Mật khẩu : <input type="text" id="user-change-mat-khau"></p>
                  <p>Ngày tạo : <input type="text" id="user-change-ngay-tao" readonly></p>
                  <p>Quyền : <span id="user-change-quyen"></span></p>
                  <p>Trạng thái : <span id="user-change-trang-thai"></span></p>
                  <center><Button id="sua" onclick="sua()">Xác nhận</Button></center>
            </div>
      </div>
</div>