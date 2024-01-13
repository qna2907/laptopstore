<div class="clear"></div>
<div class="main">
    <?php
        if(isset($_GET['action']) && $_GET['query']){
            $tam = $_GET['action'];
            $query = $_GET['query'];
        } else {
            $tam = '';
            $query = '';
        }
        if($tam == 'quanlydanhmucsanpham' && $query == 'them'){
            include("./quanlydanhmucsp/them.php");
            include("./quanlydanhmucsp/lietke.php");
        }elseif($tam == 'quanlydanhmucsanpham' && $query == 'sua'){
            include("./quanlydanhmucsp/sua.php");
        }elseif($tam == 'quanlysanpham' && $query == 'them'){
            include("./quanlysp/them.php");
            include("./quanlysp/lietke.php");
        }elseif($tam == 'quanlysanpham' && $query == 'sua'){
            include("./quanlysp/sua.php");
        }elseif($tam == 'quanlydonhang' && $query == 'lietke'){
            include("./quanlydonhang/lietke.php");
        }elseif($tam == 'donhang' && $query == 'xemdonhang'){
            include("./quanlydonhang/xemdonhang.php");
        }elseif($tam == 'quanlydanhmucbaiviet' && $query == 'them'){
            include("./quanlydanhmucbaiviet/them.php");
            include("./quanlydanhmucbaiviet/lietke.php");
        }elseif($tam == 'quanlydanhmucbaiviet' && $query == 'sua'){
            include("./quanlydanhmucbaiviet/sua.php");
        }elseif($tam == 'quanlybaiviet' && $query == 'them'){
            include("./quanlybaiviet/them.php");
            include("./quanlybaiviet/lietke.php");
        }elseif($tam == 'quanlybaiviet' && $query == 'sua'){
            include("./quanlybaiviet/sua.php");
        }elseif($tam == 'quanlyweb' && $query == 'capnhat'){
            include("./thongtinweb/quanly.php");
        }elseif($tam == 'thongkebanhang' && $query == 'thongke'){
            include("./dashboard.php");
        }else{
            include("./dashboard.php");
        }
    ?>
</div>