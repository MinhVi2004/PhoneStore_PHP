function logOut() {
      if(confirm("Bạn có muốn đăng xuất ? ")) {
            sessionStorage.removeItem('userlogin');
            window.location.href = "controller/logOut.php";
      }
}