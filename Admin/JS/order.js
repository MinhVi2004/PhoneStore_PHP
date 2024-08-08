function thayDoiTinhTrangDonHang(maDonHang, tinhTrangDonHangTiepTheo) {
      let flag = false;
      if(tinhTrangDonHangTiepTheo == 1) {
            if(confirm("Bạn có chắc muốn xác nhận đơn hàng này ?"))
                  flag = true;
      } else if( tinhTrangDonHangTiepTheo == 2) {
            if(confirm("Bạn có chắc muốn hoàn thành đơn hàng này ?"))
                  flag = true;
      }
      if(flag == true) {
            $.ajax({
                  url: "controller/thayDoiTinhTrangDonHang.php",
                  method: "POST",
                  data: { 
                        maDonHang : maDonHang,
                        tinhTrangDonHangTiepTheo : tinhTrangDonHangTiepTheo,
                  },
                  success : function(response){
                        if(response == 1) {
                              console.log("Thay đổi tình trạng đơn hàng thành công !")
                              window.location.reload();
                        } else if(response == -1) {
                              alert("Lỗi khi thay đổi tình trạng đơn hàng !");
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
      }
}
function xoaDonHang(maDonHang) {
      if(confirm("Bạn có chắc muốn xóa đơn hàng này ?")){
            $.ajax({
                  url: "controller/xoaDonHang.php",
                  method: "POST",
                  data: { 
                        maDonHang : maDonHang,
                  },
                  success : function(response){
                        if(response == 1) {
                              console.log("Xóa đơn hàng thành công !")
                              window.location.reload();
                        } else if(response == -1) {
                              alert("Lỗi khi xóa đơn hàng !");
                        } else {
                              alert("Lỗi khác !");
                        }
                  },
                  error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert("Lỗi trong quá trình xử lý Ajax.");
                  }
            });
      }
}
function openChiTietDonHang(ma_don_hang) {
      window.location.href = "http://localhost/HTTT_Project/Admin/index.php?controller=orderDetail&id=" + ma_don_hang;
}