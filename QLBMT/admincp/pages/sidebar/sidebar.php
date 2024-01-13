<div class="sidebar">
            <ul class="list_sidebar">
            <form style="border: 0;" action="./index.php?quanly=timkiem" autocomplete="off" method="POST">
                <input style="width: 60%;padding: 2px;margin: 20px 0 0 9px;" type="text" placeholder="Tìm kiếm sản phẩm" name="tukhoa">
                <button style="width: 30%;padding: 2px;margin: 0;" type="submit" name="timkiem"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <h4 style="text-align: center;">DANH MỤC SẢN PHẨM</h4>
            <?php
            $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
            $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
            while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
            ?>
            <li style="text-transform: uppercase;"><a href="./index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a></li>
            <?php
            }
            ?>
            </ul>
            <ul class="list_sidebar">
            <h4 style="text-align: center;">DANH MỤC BÀI VIẾT</h4>
            <?php
            $sql_danhmucbv = "SELECT * FROM tbl_danhmucbaiviet ORDER BY id_baiviet DESC";
            $query_danhmucbv = mysqli_query($mysqli,$sql_danhmucbv);
            while($row_danhmuc = mysqli_fetch_array($query_danhmucbv)){
            ?>
            <li style="text-transform: uppercase;"><a href="./index.php?quanly=danhmucbaiviet&id=<?php echo $row_danhmuc['id_baiviet'] ?>"><?php echo $row_danhmuc['tendanhmuc_baiviet'] ?></a></li>
            <?php
            }
            ?>
            </ul>
        </div>