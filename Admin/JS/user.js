function openUserDetail(ma_tk) {
      let user_detail_modal = document.getElementById("user-detail-modal");
      user_detail_modal.style.display = 'block';
      $.ajax({
            url: "controller/userDetail.php",
            method: "POST",
            data: { 
                  maTaiKhoan : ma_tk,
            },
            success : function(response){
                  if(response == -1) {
                        alert("Lỗi khi Xem chi tiết khách hàng !");
                  } else {
                        let user_detail = document.getElementById("user-detail");
                        user_detail.innerHTML ="";

                        let user_detail_temp = "<p>Mã tài khoản : "+response.user_ma+"</p><p>Họ và tên : "+response
                        .user_ho_ten+"</p><p>Số điện thoại : "+response.user_so_dien_thoai+"</p><p>Địa chỉ : "+response.user_dia_chi+"</p><p>Email : "+response.user_email+"</p><p>Mật khẩu : "+response.user_mat_khau+"</p><p>Ngày tạo : "+response.user_ngay_tao+"</p><p>Quyền : "+response.user_quyen+"</p><p>Trạng thái : "+((response.user_trang_thai==1)?"Bình Thường <button onclick='khoaTaiKhoan("+response.user_ma+")'>Khóa tài khoản</button>" : "Bị Khóa <button onclick='moTaiKhoan("+response.user_ma+")'>Mở tài khoản</button>")+"</p><center><Button id='suaThongTinChiTiet' onclick='openUserChange("+response.user_ma+")'>Sửa thông tin</Button></center>";

                        user_detail.innerHTML = user_detail_temp;
                        console.log("Xem chi tiết khách hàng thành công !")
                  }
            },
            error: function(xhr, status, error) {
                  console.error(xhr.responseText);
                  alert("Lỗi trong quá trình xử lý Ajax.");
            }
      });
}
function closeUserDetail() {
      let user_detail_modal = document.getElementById("user-detail-modal");
      user_detail_modal.style.display = 'none';
}
function khoaTaiKhoan(ma_tk) {
      if(confirm("Bạn có chắc muốn khóa tài khoản này ?")) {
            $.ajax({
                  url: "controller/khoaTaiKhoan.php",
                  method: "POST",
                  data: { 
                        maTaiKhoan : ma_tk,
                  },
                  success : function(response){
                        if(response == 1) {
                              alert("Khóa tài khoản thành công !")
                              window.location.reload();
                        } else if(response == -1) {
                              alert("Lỗi khi Khóa tài khoản !");
                        } else {
                              alert("Lỗi khác")
                        }
                  },
                  error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert("Lỗi trong quá trình xử lý Ajax.");
                  }
            });
      }
}
function moTaiKhoan(ma_tk) {
      if(confirm("Bạn có chắc muốn mở lại tài khoản này ?")) {
            $.ajax({
            url: "controller/moTaiKhoan.php",
            method: "POST",
            data: { 
                  maTaiKhoan : ma_tk,
            },
            success : function(response){
                  if(response == 1) {
                        alert("Mở tài khoản thành công !")
                        window.location.reload();
                  } else if(response == -1) {
                        alert("Lỗi khi Mở tài khoản !");
                  } else {
                        alert("Lỗi khác")
                  }
            },
            error: function(xhr, status, error) {
                  console.error(xhr.responseText);
                  alert("Lỗi trong quá trình xử lý Ajax.");
            }
      });
      }
}
function openUserChange(ma_tk) {
      closeUserDetail();
      let user_change_modal = document.getElementById("user-change-modal");
      user_change_modal.style.display = 'block';
      $.ajax({
            url: "controller/userDetail.php",
            method: "POST",
            data: { 
                  maTaiKhoan : ma_tk,
            },
            success : function(response){
                  if(response == -1) {
                        alert("Lỗi khi Xem chi tiết khách hàng !");
                  } else {
                        document.getElementById("user-change-ma").innerHTML = response.user_ma;
                        document.getElementById("user-change-ho-ten").value = response.user_ho_ten;
                        document.getElementById("user-change-so-dien-thoai").value = response.user_so_dien_thoai;
                        document.getElementById("user-change-dia-chi").value = response.user_dia_chi;
                        document.getElementById("user-change-email").value = response.user_email;
                        document.getElementById("user-change-mat-khau").value = response.user_mat_khau;
                        document.getElementById("user-change-ngay-tao").value = response.user_ngay_tao;
                        document.getElementById("user-change-quyen").innerHTML = "<select name='quyen' id='user-change-quyen-select'><option value='User' selected>User</option><option value='Admin'>Admin</option></select>";
                        if(response.user_trang_thai == 1) {
                              document.getElementById("user-change-trang-thai").innerHTML = "<select name='trangthai' id='user-change-trang-thai-select'><option value='1' selected>Bình Thường</option><option value='0'>Khóa</option></select>";
                        } else {
                              document.getElementById("user-change-trang-thai").innerHTML = "<select name='trangthai' id='user-change-trang-thai-select'><option value='1'>Bình Thường</option><option value='0' selected>Khóa</option></select>";
                        }
                        
                        console.log("Xem chi tiết khách hàng thành công !")
                  }
            },
            error: function(xhr, status, error) {
                  console.error(xhr.responseText);
                  alert("Lỗi trong quá trình xử lý Ajax.");
            }
      });
}
function closeUserChange(){
      let user_change_modal = document.getElementById("user-change-modal");
      user_change_modal.style.display = 'none';
}
function sua() {
      let ma_tk = document.getElementById("user-change-ma").innerText;
      let ho_ten = document.getElementById("user-change-ho-ten").value;
      let so_dien_thoai = document.getElementById("user-change-so-dien-thoai").value;
      let dia_chi = document.getElementById("user-change-dia-chi").value;
      let email = document.getElementById("user-change-email").value;
      let mat_khau = document.getElementById("user-change-mat-khau").value;
      let quyen = document.getElementById("user-change-quyen-select").value;
      let trang_thai = document.getElementById("user-change-trang-thai-select").value;
      $.ajax({
            url: "controller/suaThongTinChiTiet.php",
            method: "POST",
            data: { 
                  ma_tk : ma_tk,
                  ho_ten : ho_ten,
                  so_dien_thoai : so_dien_thoai,
                  dia_chi : dia_chi,
                  email : email,
                  mat_khau : mat_khau,
                  quyen : quyen,
                  trang_thai : trang_thai,
            },
            success : function(response){
                  if(response == 1) {
                        alert("Thay đổi chi tiết khách hàng thành công !");
                        closeUserChange();
                        window.location.reload();
                  } else {
                        alert("Lỗi khi thay đổi chi tiết khách hàng !")
                        console.log(response)
                  }
            },
            error: function(xhr, status, error) {
                  console.error(xhr.responseText);
                  alert("Lỗi trong quá trình xử lý Ajax.");
            }
      });
}