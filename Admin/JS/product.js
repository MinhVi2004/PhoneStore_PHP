
function setIMGProduct() {
      let img = document.getElementById('productCreate-anh-sp-img');
      let imgLink = document.getElementById('productCreate-anh-sp');

      img.src = imgLink.value;
}
function setIMGProductImport() {
      let imgImport = document.getElementById('productImport-anh-sp-img');
      let imgLinkImport = document.getElementById('productImport-anh-sp');

      imgImport.src = imgLinkImport.value;
}
function khoaSanPham(ma_sp) {
      if(confirm("Bạn có chắc muốn khóa sản phẩm này ?")) {
            $.ajax({
                  url: "controller/xoaSanPham.php",
                  method: "POST",
                  data: { 
                        ma_sp : ma_sp,
                  },
                  success : function(response){
                        if(response == 1) {
                              alert("Khóa sản phẩm thành công !")
                              window.location.reload();
                        } else {
                              alert("Lỗi khi khóa sản phẩm !")
                              console.log(response)
                        }
                  },
                  error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert("Lỗi trong quá trình xử lý Ajax.");
                  }
            });
      }
}

function moSanPham(ma_sp) {
      if(confirm("Bạn có chắc muốn mở khóa sản phẩm này ?")) {
            $.ajax({
                  url: "controller/moSanPham.php",
                  method: "POST",
                  data: { 
                        ma_sp : ma_sp,
                  },
                  success : function(response){
                        if(response == 1) {
                              alert("Mở khóa sản phẩm thành công !")
                              window.location.reload();
                        } else {
                              alert("Lỗi khi mở khóa sản phẩm !")
                              console.log(response)
                        }
                  },
                  error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert("Lỗi trong quá trình xử lý Ajax.");
                  }
            });
      }
}
function suaSanPham(ma_sp) {
      window.location.href = "http://localhost/HTTT_Project/Admin/index.php?controller=productChange&id=" + ma_sp;
}
function updateProduct() {
      if(confirm("Bạn có chắc muốn cập nhật sản phẩm này ?")) {
            let maSp = document.getElementById('product-ma-sp').value;
            let tenSp = document.getElementById('product-ten-sp').value;
            let anhSp = document.getElementById('product-anh-sp').value;
            let loaiSp = document.getElementById('product-loai-sp').value;
            let giaSp = document.getElementById('product-gia-sp').value;
            let motaSp = document.getElementById('product-mo-ta-sp').value;
            $.ajax({
                  url: "controller/suaSanPham.php",
                  method: "POST",
                  data: { 
                        maSp : maSp,
                        tenSp : tenSp,
                        anhSp : anhSp,
                        loaiSp : loaiSp,
                        giaSp : giaSp,
                        motaSp : motaSp,
                  },
                  success : function(response){
                        if(response == 1) {
                              alert("Sửa sản phẩm thành công !")
                              window.location.reload();
                        } else {
                              alert("Lỗi khi sửa sản phẩm !")
                              console.log(response)
                        }
                  },
                  error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert("Lỗi trong quá trình xử lý Ajax.");
                  }
            });
      }
}
function createProduct() {
      if(confirm("Bạn có chắc muốn thêm sản phẩm này ?")) {
            let tenSp = document.getElementById('productCreate-ten-sp').value;
            let anhSp = document.getElementById('productCreate-anh-sp').value;
            let loaiSp = document.getElementById('productCreate-loai-sp').value;
            let giaSp = document.getElementById('productCreate-gia-sp').value;
            let motaSp = document.getElementById('productCreate-mo-ta-sp').value;
            $.ajax({
                  url: "controller/productCreate.php",
                  method: "POST",
                  data: {
                        tenSp : tenSp,
                        anhSp : anhSp,
                        loaiSp : loaiSp,
                        giaSp : giaSp,
                        motaSp : motaSp,
                  },
                  success : function(response){
                        if(response == 1) {
                              alert("Thêm sản phẩm thành công !")
                              window.location.reload();
                        } else {
                              console.log(response)
                              alert("Lỗi khi thêm sản phẩm !")
                        }
                  },
                  error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert("Lỗi trong quá trình xử lý Ajax.");
                  }
            });
      }
}
function importProduct(maSp) {
      let soLuongNhap = parseInt(prompt("Nhập số lượng sản phẩm cần nhập : "));
      if (!isNaN(soLuongNhap)) 
            if(soLuongNhap != null) {
                  $.ajax({
                        url: "controller/productImport.php",
                        method: "POST",
                        data: {
                              maSp : maSp,
                              soLuongNhap : soLuongNhap,
                        },
                        success : function(response){
                              if(response == 1) {
                                    alert("Thêm sản phẩm vào phiếu nhập thành công !")
                                    window.location.reload();
                              } else {
                                    console.log(response)
                                    alert("Lỗi khi thêm sản phẩm vào phiếu nhập !")
                              }
                        },
                        error: function(xhr, status, error) {
                              console.error(xhr.responseText);
                              alert("Lỗi trong quá trình xử lý Ajax.");
                        }
                  });
            }
      else 
            alert("Đây không phải là một số nguyên hợp lệ.");
}
function completeImportBill(maPhieu) {
      if(confirm("Bạn có chắc muốn xác nhận tạo phiếu nhập hàng ?")) 
            $.ajax({
                  url: "controller/completeImportBill.php",
                  method: "POST",
                  data: {
                        maPhieu : maPhieu,
                  },
                  success : function(response){
                        if(response == 1) {
                              alert("Tạo phiếu nhập thành công !")
                              window.location.reload();
                        } else {
                              console.log(response)
                              alert("Lỗi khi tạo phiếu nhập !")
                        }
                  },
                  error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert("Lỗi trong quá trình xử lý Ajax.");
                  }
            });
}
function openChiTietPhieuNhap(maPhieu) {
      window.location.href = "http://localhost/HTTT_Project/Admin/index.php?controller=productImportDetail&id=" + maPhieu;
}