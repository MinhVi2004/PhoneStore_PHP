//? -----------------------------------------------------------------------------------------------------------------------
//?                                                              Validate
var specialChars = "<>@!#$%^&*()_+[]{}?:;|'\"\\,./~`-=";
var specialCharsForEmail = "<>!#$%^&*()_+[]{}?:;|'\"\\,/~`-=";
var specialCharsForPhoneNumber = "@.<>!#$%^&*()_+[]{}?:;|'\"\\,/~`-=abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
function checkForSpecialChar(string){
      for(i = 0; i < specialChars.length;i++){
            if(string.indexOf(specialChars[i]) > -1){
                  return true;
            }
      }
      return false;
}
function checkForSpecialCharForEmail(string){
      for(i = 0; i < specialCharsForEmail.length;i++){
            if(string.indexOf(specialCharsForEmail[i]) > -1){
                  return true;
            }
      }
      return false;
}
function checkForSpecialCharForPhoneNumber(string){
      for(i = 0; i < specialCharsForPhoneNumber.length;i++){
            if(string.indexOf(specialCharsForPhoneNumber[i]) > -1){
                  return true;
            }
      }
      return false;
}
//? Xử lý đăng ký
function validateSignin() {
      var flag = true;
      var fullname = document.getElementById('signin-fullname').value;
      var fullname_error = document.getElementById('signin-fullname-error');
      var email = document.getElementById('signin-email').value;
      var email_error = document.getElementById('signin-email-error');
      var phone = document.getElementById('signin-phone').value;
      var phone_error = document.getElementById('signin-phone-error');
      var gender = document.getElementsByName("signin-gender");
      var gender_error = document.getElementById('signin-gender-error');
      var password = document.getElementById('signin-password').value;
      var password_error = document.getElementById('signin-password-error');
      var repassword = document.getElementById('signin-repassword').value;
      var repassword_error = document.getElementById('signin-repassword-error');
      //? Fullname validate
      if (fullname == '' || fullname.length < 4 || checkForSpecialChar(fullname) == true) {
            fullname_error.style.display = 'block';   
            flag = false;
      } else {
            fullname_error.style.display = 'none';
      }
      //? Email validate
      if (email == '' || email.length < 10 || checkForSpecialCharForEmail(email) == true) {
            email_error.style.display = 'block';    
            flag = false;
      } else {
            email_error.style.display = 'none';   
      }
      //? Phone validate
      if (phone == '' || phone.length > 10 ||phone.length < 9 || checkForSpecialCharForPhoneNumber(phone) == true) {
            phone_error.style.display = 'block';    
            flag = false;
      } else {
            phone_error.style.display = 'none';   
      }
      //? Password validate
      if (password == '' || password.length < 6) {
            password_error.style.display = 'block';    
            flag = false;
      } else {
            password_error.style.display = 'none';   
      }
      //? Repassword validate
      if(repassword != password || repassword == '') {
            repassword_error.style.display = 'block'; 
            flag = false;
      } else {
            repassword_error.style.display = 'none';
      }
      return flag;

}
/* AJAX  */
function signin(link){
      var email_error = document.getElementById('signin-email-error');
      var phone_error = document.getElementById('signin-phone-error');
      var fullname = document.getElementById('signin-fullname').value;
      var email = document.getElementById('signin-email').value;
      var phone = document.getElementById('signin-phone').value;
      var address = document.getElementById('signin-address').value;
      var password = document.getElementById('signin-password').value;
      if(validateSignin() == true) {
            $.ajax({
                  url: link,
                  method: "POST",
                  data: { 
                        signin_fullname : fullname,
                        signin_email : email,
                        signin_phone : phone,
                        signin_password : password,
                        signin_address : address
                  },
                  success : function(response){
                        console.log(response);
                        if (response == "1") {
                              openLogin();
                        } else if(response == "-1"){
                              email_error.style.display= 'block';
                        } else {
                              alert("Loi khac");
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
function validateLogin() {
      let flag = true;
      var email = document.getElementById('login-email').value;
      var email_error = document.getElementById('login-email-error');
      var password = document.getElementById('login-password').value;
      var password_error = document.getElementById('login-password-error');
      if (email == '' || email.length < 4 || checkForSpecialCharForEmail(email) == true) {
            email_error.style.display = 'block';
            flag = false;
      } else {
            email_error.style.display = 'none';
      }
      if (password == '' || password.length < 4) {
            password_error.style.display = 'block';
            flag = false;
      } else {
            password_error.style.display = 'none';
      }
      return flag;
}
function login (linkXuLyPHP) {
      var email = document.getElementById('login-email').value;
      var email_error = document.getElementById('login-email-error');
      var password = document.getElementById('login-password').value;
      var password_error = document.getElementById('login-password-error');
      if(validateLogin() == true) {
            $.ajax({
                  url: linkXuLyPHP,
                  method: "POST",
                  data: { 
                        login_email : email,
                        login_password : password,
                  },
                  success : function(response){
                        if (response == "-1") { //? Không tồn tại tài khoản
                              console.log("Lỗi sai email")
                              email_error.style.display = 'block';
                        } else if(response == "0"){ //? Sai mật khẩu
                              password_error.style.display = 'block';
                        } else { //? đúng thông tin
                              if(response.user_status!=0) {
                                    let userlogin = {
                                          id : response.user_id,
                                          fullname : response.user_fullname,
                                          email : response.user_email,
                                          password:response.user_password,
                                          phone:response.user_phone,
                                          address:response.user_address,
                                          permission:response.user_permission
                                    }
                                    sessionStorage.setItem('userlogin',JSON.stringify(userlogin));
                                    closeLogin();
                                    checkLogin();
                              } else {
                                    alert("Tài khoản bị khóa !!!");
                              }
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