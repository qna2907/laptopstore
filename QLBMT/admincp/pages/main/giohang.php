<style>
    th, td {
    border-bottom: 1px solid #ddd;
}
tr:hover{
    background-color: coral;
}
tr:nth-child(even) {
    background-color: #f2f2f2;
}
th {
    background-color: #04AA6D;
    color: white;
}
</style>
<h3 style="color: red; text-transform: uppercase;">Giỏ hàng
  <?php
  if(isset($_SESSION['dangky'])){
    echo 'xin chào: '.'<span style="color: red;">'.$_SESSION['dangky'].'</span>';
  }
  ?>
</h3>
<?php
    if(isset($_SESSION['cart'])){
    }
?>
<table style="width: 100%;">
  <tr>
    <th>Id</th>
    <th>Mã sản phẩm</th>
    <th>Tên sản phẩm</th>
    <th>Hình ảnh</th>
    <th>Số lượng</th>
    <th>Giá sản phẩm</th>
    <th>Thành tiền</th>
    <th>Quản lý</th>
  </tr>
  <?php
  if(isset($_SESSION['cart'])){
    $i=-1;
    $tongtien = 0;
    foreach ($_SESSION['cart'] as $cart_item){
        $thanhtien = $cart_item['soluong']*$cart_item['giasp'];
        $tongtien += $thanhtien;
        $i++;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $cart_item['masp'] ?></td>
    <td><?php echo $cart_item['tensanpham'] ?></td>
    <td><img src="../../../admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh'] ?>" width="150px"></td>
    <td style="text-align: center;">
      <a href="../main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa-sharp fa-solid fa-minus fa-style"></i></a>
      <?php echo $cart_item['soluong'] ?>
      <a href="../main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa-sharp fa-solid fa-plus fa-style"></i></a>
    </td>
    <td><?php echo number_format($cart_item['giasp'],0,',','.').'vnd' ?></td>
    <td><?php echo number_format($thanhtien,0,',','.').'vnd' ?></td>
    <td style="text-align: center;"><a href="../main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>">Xóa</a></td>
  </tr>
  <?php
    }
    ?>
    <tr>
    <td colspan="8">
        <p style="float: left;">Tổng tiền: <?php echo number_format($tongtien,0,',','.').'vnd' ?></p>
        <p style="float: right;"><a href="../main/themgiohang.php?xoatatca=1"> Xóa tất cả</a></p>
        <div style="clear: both;"></div>
        <?php
        if(isset($_SESSION['dangky'])){
          ?>
          <p style="text-align: center;"><a href="../main/thanhtoan.php">Đặt Hàng</a></p>
          <?php
          }else{
          ?>
          <p style="text-align: center;"><a href="./index.php?quanly=dangnhap">Đăng Nhập</a></p>
          <p style="text-align: center;"><a href="./index.php?quanly=dangky">Đăng Ký Đặt Hàng</a></p>
          <?php
          }
          ?>
    </td>
    </tr>
    <?php
  }else{
  ?>
  <tr>
    <td colspan="8" style="text-align: center;">Hiện tại giỏ hàng trống</td>
  </tr>
  <?php
  }
  ?>
</table>