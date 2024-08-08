<?php
// Khởi động phiên
session_start();

// Xóa tất cả các biến phiên
$_SESSION = array();


session_destroy();

header("Location: ../../index.php");
exit();