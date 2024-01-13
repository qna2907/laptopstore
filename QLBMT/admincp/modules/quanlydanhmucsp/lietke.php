<?php
    $sql_lietke_danhmucsp = "SELECT * FROM tbl_danhmuc ORDER BY thutu DESC";
    $query_lietke_danhmucsp = mysqli_query($mysqli,$sql_lietke_danhmucsp);
?>
<p style="text-align: center; font-size: 20px;">Liệt kê danh mục sản phẩm</p>
<table border="1px" width="100%" style="border-collapse: collapse;">
  <tr>
    <th>Id</th>
    <th>Tên danh mục</th>
    <th>Quản lý</th>
  </tr>
<?php
    $i = -1;
    while($row = mysqli_fetch_array($query_lietke_danhmucsp)){
      $i++;
?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tendanhmuc'] ?></td>
    <td>
      <a href="quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Xóa</a> | <a href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Sửa</a>
    </td>
  </tr>
<?php
    }
?>
</table>