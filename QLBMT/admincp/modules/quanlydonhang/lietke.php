<?php
    $sql_lietke_dh = "SELECT * FROM tbl_giohang,tbl_dangky WHERE tbl_giohang.id_khachhang = tbl_dangky.id_dangky ORDER BY 
    tbl_giohang.id_cart DESC";
    $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
?>
<p style="text-align: center; font-size: 20px;">Liệt kê đơn hàng</p>
<table border="1px" width="100%" style="border-collapse: collapse;">
  <tr>
    <th>Id</th>
    <th>Mã đơn hàng</th>
    <th>Tên khách hàng</th>
    <th>Địa chỉ</th>
    <th>Email</th>
    <th>Số điện thoại</th>
    <th>Tình trạng</th>
    <th>Quản lý</th>
  </tr>
<?php
    $i = -1;
    while($row = mysqli_fetch_array($query_lietke_dh)){
      $i++;
?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['code_cart'] ?></td>
    <td><?php echo $row['tenkhachhang'] ?></td>
    <td><?php echo $row['diachi'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['dienthoai'] ?></td>
    <td>
        <?php
            if($row['cart_status'] == 1){
                echo '<a href="quanlydonhang/xuly.php?code='.$row['code_cart'].'">Đơn hàng mới</a>';
            }else{
              echo 'Đã xử lý';
            }
        ?>
    </td>
    <td>
      <a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart'] ?>">Xem đơn hàng</a>
    </td>
  </tr>
<?php
    }
?>
</table>