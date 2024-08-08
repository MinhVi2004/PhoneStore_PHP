<div id="login-modal">
      <div id="login-container">
            <i class="fa-regular fa-x" id="close-login" onclick="closeLogin()"></i>
            <center>
                  <h3>Đăng Nhập Tài Khoản</h3>
            </center>
            <form>
                  <div>
                        <label for="login-email">Email</label>
                        <br>
                        <input type="text" name="login-email" id="login-email" placeholder="Nhập Email">
                                    <p id="login-email-error" class="error">Email không hợp lệ</p>
                  </div>
                  <div>
                        <label for="login-password">Mật khẩu</label>
                        <br>
                        <input type="password" name="login-password" id="login-password"
                              placeholder="Nhập mật khẩu">
                        <p id="login-password-error" class="error">Mật khẩu không hợp lệ</p>
                  </div>
                  <input type="button" name="login-submit" id="login-submit" value="Đăng Nhập" onclick="login('controller/log_in.php')">
            </form>
            <center>
                  <p class="line"></p>
                  <p>Bạn chưa có tài khoản?</p>
                  <button type="button" onclick="openSignin()">Đăng Ký</button>
            </center>
      </div>
</div>