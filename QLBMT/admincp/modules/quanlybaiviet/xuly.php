<?php
    include("../../config/config.php");
    $tenbaiviet = $_POST['tenbaiviet'];
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $danhmuc = $_POST['danhmuc'];
    $tinhtrang = $_POST['tinhtrang'];
     //xử lý hình ảnh
     $hinhanh= $_FILES['hinhanh']['name'];
     $hinhanh_tmp= $_FILES['hinhanh']['tmp_name'];
     $hinhanh = time().'_'.$hinhanh;
    if(isset( $_POST['thembaiviet'])){
        //thêm
        $sql_them = "INSERT INTO tbl_baiviet(tenbaiviet,tomtat,noidung,id_danhmuc,tinhtrang,hinhanh) VALUE ('".$tenbaiviet."','".$tomtat."'
        ,'".$noidung."','".$danhmuc."','".$tinhtrang."','".$hinhanh."')";
        mysqli_query($mysqli,$sql_them);
        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
        header('Location:../index.php?action=quanlybaiviet&query=them');
    }
    elseif(isset( $_POST['suabaiviet'])){
        //sửa
        if($hinhanh!=''){
            move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
            $sql_sua = "UPDATE tbl_baiviet SET tenbaiviet = '".$tenbaiviet."',tomtat = '".$tomtat."',noidung = '".$noidung."'
            ,tinhtrang = '".$tinhtrang."',id_danhmuc = '".$danhmuc."',hinhanh = '".$hinhanh."' WHERE id = '$_GET[idbaiviet]' ";
            // Xóa hình ảnh cũ
            $sql = "SELECT * FROM tbl_baiviet WHERE id = '$_GET[idbaiviet]' LIMIT 1";
            $query = mysqli_query($mysqli,$sql);
            while($row = mysqli_fetch_array($query)){
                unlink('../quanlybaiviet/uploads/'.$row['hinhanh']);
            }
            }else{
            $sql_sua = "UPDATE tbl_baiviet SET tenbaiviet = '".$tenbaiviet."',tomtat = '".$tomtat."',noidung = '".$noidung."'
            ,tinhtrang = '".$tinhtrang."',id_danhmuc = '".$danhmuc."' WHERE id = '$_GET[idbaiviet]' ";
            }
        mysqli_query($mysqli,$sql_sua);
        header('Location:../index.php?action=quanlybaiviet&query=them');
    }else{
        $id = $_GET['idbaiviet'];
        $sql = "SELECT * FROM tbl_baiviet WHERE id = '$id' LIMIT 1";
        $query = mysqli_query($mysqli,$sql);
        while($row = mysqli_fetch_array($query)){
            unlink('../quanlysp/uploads/'.$row['hinhanh']);
        }
        $sql_xoa = "DELETE FROM tbl_baiviet WHERE id = '".$id."'";
        mysqli_query($mysqli,$sql_xoa);
        header('Location:../index.php?action=quanlybaiviet&query=them');
    }
?>