<h3 style="color: red;text-transform: uppercase;">Tin tức mới nhất</h3>
<?php
     $sql_bv = "SELECT * FROM tbl_baiviet WHERE tinhtrang = 1 ORDER BY id DESC";
     $query_bv = mysqli_query($mysqli,$sql_bv);
?>
          <ul class="product_list">
               <?php
               while($row_bv = mysqli_fetch_array($query_bv)){
               ?>
               <li>
                    <a href="./index.php?quanly=baiviet&id=<?php echo $row_bv['id'] ?>">
                         <img src="../../modules/quanlybaiviet/uploads/<?php echo $row_bv['hinhanh'] ?>">
                         <p class="title_product">Tên bài viết: <?php echo $row_bv['tenbaiviet'] ?></p>
                         <p class="title_product">Tóm tắt bài viết: <?php echo $row_bv['tomtat'] ?></p>
                    </a>
               </li>
               <?php
               }
               ?>
          </ul>