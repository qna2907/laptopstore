<?php
$mysqli = new mysqli("localhost","root","usbw","test");
// kiểm tra kết nối
if ($mysqli->connect_errno) {
    echo "Kết nối thất bại!" . $mysqli->connect_error;
    exit();
}
?>