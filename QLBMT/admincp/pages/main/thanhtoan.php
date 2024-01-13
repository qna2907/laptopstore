<?php
    session_start();
    include("../../config/config.php");
    $id_khachhang = $_SESSION['id_khachhang'];
    $code_order = rand(0,9999);
    $insert_cart = "INSERT INTO tbl_giohang (id_khachhang,code_cart,cart_status) VALUE ('".$id_khachhang."','".$code_order."',1)";
    $cart_query = mysqli_query($mysqli,$insert_cart);
    if($cart_query){
        //Thêm giỏ hàng chi tiết
        foreach($_SESSION['cart'] as $key => $value){
            $id_sanpham = $value['id'];
            $soluong = $value['soluong'];
            $insert_order_details = "INSERT INTO tbl_cart_details (code_cart,id_sanpham,soluongmua) VALUE ('".$code_order."','".$id_sanpham."','".$soluong."')";
            mysqli_query($mysqli,$insert_order_details);

        }
    }
    unset($_SESSION['cart']);
    header('Location:../sidebar/index.php?quanly=thankyou');
?>