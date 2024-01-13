
<style>
    *{
        box-sizing: border-box
    }
    .container {
         padding: 16px;
    }
    input[type=text], input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }
    input[type=text]:focus, input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }
    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }
    .registerbtn {
        background-color: #04AA6D;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    .registerbtn:hover {
        opacity:1;
    }
    a {
        color: dodgerblue;
    }
    .signin {
        background-color: #f1f1f1;
        text-align: center;
    }
</style>
<?php
    session_start();
    if(isset($_POST['dangky'])){
        $tenkhachhang = $_POST['hovaten'];
        $email = $_POST['email'];
        $diachi = $_POST['diachi'];
        $matkhau = md5($_POST['matkhau']);
        $dienthoai = $_POST['sodienthoai'];
        $sql_dangky = mysqli_query($mysqli,"INSERT INTO tbl_dangky(tenkhachhang,email,diachi,matkhau,dienthoai) VALUE('".$tenkhachhang."'
        ,'".$email."','".$diachi."','".$matkhau."','".$dienthoai."')");
        if($sql_dangky){
            echo '<p style="color:green">Bạn đã đăng ký thành công chọn giỏ hàng để tiếp tục</p>';
            $_SESSION['dangky'] = $tenkhachhang;

            $_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);
            header('Location:index.php?quanly=giohang');
        }
    }
?>
<form action="" autocomplete="off" method="POST">
  <div class="container">
    <h1>Đăng Ký</h1>
    <p>Điền thông tin vào form đăng ký để thêm mới tài khoản.</p>
    <hr>
    <label for="hovaten"><b>Họ và tên: </b></label>
    <input type="text" placeholder="Nhập họ và tên" name="hovaten" id="hovaten" required>

    <label for="sodienthoai"><b>Số điện thoại: </b></label>
    <input type="text" placeholder="Nhập số điện thoại" name="sodienthoai" id="sodienthoai" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Nhập Email" name="email" id="email" required>

    <label for="diachi"><b>Địa chỉ: </b></label>
    <input type="text" placeholder="Nhập địa chỉ" name="diachi" id="diachi" required>

    <label for="psw"><b>Mật khẩu:</b></label>
    <input type="password" placeholder="Nhập mật khẩu" name="matkhau" id="matkhau" required>

    <hr>

    <p>Bằng cách tạo một tài khoản, bạn đồng ý với <a href="#">Điều khoản & Quyền riêng tư</a>.</p>
    <button type="submit" class="registerbtn" name="dangky">Đăng Ký</button>
  </div>

  <div class="container signin">
    <p>Bạn có sẵn sàng để tạo 1 tài khoản? <a href="./index.php?quanly=dangnhap">Đăng nhập</a>.</p>
  </div>
</form>