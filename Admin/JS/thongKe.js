function thongKe() {
      let thang = document.getElementById("thongKe-month").value;
      let nam = document.getElementById("thongKe-year").value;
      window.location.href = "http://localhost/HTTT_Project/Admin/index.php?controller=thongKe&month=" + thang + "&year=" + nam;
}