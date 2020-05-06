<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "quanlisvver1";

// Lệnh kết nối CSDL
$connect = mysqli_connect($host, $user, $password, $database);
mysqli_set_charset($connect, "utf8"); // Lấy về dữ liệu Unicode

$isOK = false;

// Kiểm tra kết nối
if (mysqli_connect_errno()) {
    echo "Lỗi kết nối: " . mysqli_connect_error();
} else {
    //echo "Kết nối thành công!";
    $isOK = true;
}
?>