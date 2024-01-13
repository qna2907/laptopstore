<style>
ul.baiviet{
    padding: 0;
    margin: 0;
    list-style: none;
}
ul.baiviet li{
    margin: 10px;
    border: 1px solid #000066;
}
</style>
<?php
     $sql_bv = "SELECT * FROM tbl_baiviet WHERE tbl_baiviet.id = '$_GET[id]' LIMIT 1";
     $query_bv = mysqli_query($mysqli,$sql_bv);
     $query_bv_all = mysqli_query($mysqli,$sql_bv);
     $row_bv_title = mysqli_fetch_array($query_bv);
?>
     <h3 style="color: red; margin: 10px;">Bài viết: <?php echo $row_bv_title['tenbaiviet'] ?> </h3>
          <ul class="baiviet">
               <?php
               while($row_bv = mysqli_fetch_array($query_bv_all)){
               ?>
               <li>
                    <h2><?php echo $row_bv['tenbaiviet'] ?></h2>
                    <img src="../../modules/quanlybaiviet/uploads/<?php echo $row_bv['hinhanh'] ?>">
                    <p>Tóm tắt bài viết: <?php echo $row_bv['tomtat'] ?></p>
                    <p>Nội dung bài viết: <?php echo $row_bv['noidung'] ?></p>
               </li>
               <?php
               }
               ?>
          </ul>