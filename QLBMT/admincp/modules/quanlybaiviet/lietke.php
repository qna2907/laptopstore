<?php
    $sql_lietke_bv = "SELECT * FROM tbl_baiviet,tbl_danhmucbaiviet WHERE tbl_baiviet.id_danhmuc=tbl_danhmucbaiviet.id_baiviet
    ORDER BY tbl_baiviet.id DESC";
    $query_lietke_bv = mysqli_query($mysqli,$sql_lietke_bv);
?>
<p style="font-size: 20px; text-align: center;">Liệt kê danh mục bài viết</p>
<table border="1px" width="100%" style="border-collapse: collapse;">
  <tr>
    <th>Id</th>
    <th>Tên bài viết</th>
    <th>Hình ảnh</th>
    <th>Tóm tắt</th>
    <th>Nội dung</th>
    <th>Danh mục</th>
    <th>Trạng thái</th>
    <th>Quản lý</th>
  </tr>
<?php
    $i = -1;
    while($row = mysqli_fetch_array($query_lietke_bv)){
      $i++;
?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tenbaiviet'] ?></td>
    <td><img src="../../../admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="200px"></td>
    <td><?php echo $row['tomtat'] ?></td>
    <td><?php echo $row['noidung'] ?></td>
    <td><?php echo $row['tendanhmuc_baiviet'] ?></td>
    <td><?php if($row['tinhtrang'] == 1){
      echo 'Kích hoạt';
    }else{
      echo 'Ẩn';
    } 
    ?></td>
    <td>
      <a href="quanlybaiviet/xuly.php?idbaiviet=<?php echo $row['id'] ?>">Xóa</a> |
      <a href="?action=quanlybaiviet&query=sua&idbaiviet=<?php echo $row['id'] ?>">Sửa</a>
    </td>
  </tr>
<?php
    }
?>
</table>