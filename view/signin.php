<div id="signin-modal">
      <div id="signin-container">
            <i class="fa-regular fa-x" id="close-signin" onclick="closeSignin()"></i>
            <center>
                  <h3>Đăng Ký Tài Khoản</h3>
            </center>
            <form>
                  <div>
                        <label for="signin-fullname">Họ và tên</label>
                        <br>
                        <input type="text" name="signin-fullname" id="signin-fullname"placeholder="Nhập họ và tên">
                        <p class="error" id="signin-fullname-error">Họ và tên không hợp lệ</p>
                  </div>
                  <div>
                        <label for="signin-email">Email</label>
                        <br>
                        <input type="text" name="signin-email" id="signin-email" placeholder="Nhập Email">
                        <p class="error" id="signin-email-error">Email không hợp lệ</p>
                  </div>
                  <div>
                        <label for="signin-phone">Số điện thoại</label>
                        <br>
                        <input type="text" name="signin-phone" id="signin-phone" placeholder="Nhập số điện thoại">
                        <p class="error" id="signin-phone-error">Số điện thoại không hợp lệ</p>
                  </div>
                  <div>
                        <label for="signin-address">Địa chỉ</label>
                        <br>
                        <input type="text" name="signin-address" id="signin-address" placeholder="Nhập địa chỉ">
                        <p class="error" id="signin-address-error">Địa chỉ không hợp lệ</p>
                  </div>
                  <div>
                        <label for="signin-password">Mật khẩu</label>
                        <br>
                        <input type="password" name="signin-password" id="signin-password" placeholder="Nhập mật khẩu">
                        <p class="error" id="signin-password-error">Mật khẩu không hợp lệ</p> 
                  </div>
                  <div>
                        <label for="signin-repassword">Nhập lại mật khẩu</label>
                        <br>
                        <input type="password" name="signin-repassword" id="signin-repassword"
                              placeholder="Nhập lại mật khẩu">
                        <p class="error" id="signin-repassword-error">Vui lòng nhập lại mật khẩu</p>
                  </div>
                  <center>
                        <input type="button" name="signin-submit" id="signin-submit" value="Hoàn Thành" onclick="signin('controller/sign_in.php')">
                        <p class="line"></p>
                        <p>Bạn đã có tài khoản?</p>
                        <button type="button" onclick="openLogin()" id="moveLogin">Đăng Nhập</button>
                  </center>
            </form>
      </div>
</div>