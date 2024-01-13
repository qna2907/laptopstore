<style>
     .list_page{
          margin: 0;
          padding: 0;
          list-style: none;
     }
     .list_page li{
          float: left;
          padding: 5px 12px;
          margin: 5px;
          background: burlywood;
          display: block;
     }
     .list_page li a{
          color: blue;
          text-align: center;
          text-decoration: none;
     }
</style>
<?php
     if(isset($_GET['trang'])){
          $page = $_GET['trang'];
     }else{
          $page = '';
     }
     if($page == '' || $page == 1){
          $begin = 0;
     }else{
          $begin = ($page*10)-10;
     }
     $sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham 
     DESC LIMIT $begin,10";
     $query_pro = mysqli_query($mysqli,$sql_pro);
?>
<h3 style="color: red;text-transform: uppercase;">Sản phẩm mới nhất</h3>
            <ul class="product_list">
                <?php
                while($row_pro = mysqli_fetch_array($query_pro)){
                ?>
                <li>
                    <a href="./index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>">
                         <img src="../../modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>">
                         <p class="title_product">TÊN SẢN PHẨM: <?php echo $row_pro['tensanpham'] ?></p>
                         <p class="price_product">GIÁ: <?php echo number_format($row_pro['giasp'],0,',','.').'vnd' ?> </p>
                    </a>
               </li>
                <?php
                }
                ?>
            </ul>
            <div style="clear: both;"></div>
            <?php
            $sql_page = mysqli_query($mysqli,"SELECT * FROM tbl_sanpham"); 
            $row_count = mysqli_num_rows($sql_page);
            $trang = ceil($row_count/10);
            ?>
            <ul class="list_page">
               <?php
               for($i = 1; $i <= $trang; $i++){
               ?>
               <li><a <?php if($i == $page){ echo 'style="color:red;"';}else{echo '';} ?> href="index.php?trang=<?php echo $i ?>">
               <?php echo $i ?></a></li>
               <?php
               }
               ?>
            </ul>