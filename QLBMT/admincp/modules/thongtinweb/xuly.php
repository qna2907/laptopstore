<?php
    include('../../config/config.php');
    $thongtinlienhe = $_POST['thongtinlienhe'];
    $id = $_GET['id'];
    if(isset( $_POST['capnhatlienhe'])){
        //sửa
        $sql_sua = "UPDATE tbl_lienhe SET thongtinlienhe = '".$thongtinlienhe."' WHERE id = '$id' ";
        mysqli_query($mysqli,$sql_sua);
        header('Location:.././index.php?action=quanlyweb&query=capnhat');
    }
?>