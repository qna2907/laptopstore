<style>
    form {
    border: 3px solid #f1f1f1;
  }
  
  /* Full-width inputs */
  input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
  }
  
  /* Set a style for all buttons */
  .login {
    background-color: #04AA6D;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
  }
  
  /* Add a hover effect for buttons */
  button:hover {
    opacity: 0.8;
  }
  
  /* Extra style for the cancel button (red) */
  .cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
  }
  
  /* Center the avatar image inside this container */
  .imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
  }
  
  /* Avatar image */
  img.avatar {
    width: 40%;
    border-radius: 50%;
  }
  
  /* Add padding to containers */
  .container {
    padding: 16px;
  }
  
  /* The "Forgot password" text */
  span.psw {
    float: right;
    padding-top: 16px;
  }
  
  /* Change styles for span and cancel button on extra small screens */
  @media screen and (max-width: 300px) {
    span.psw {
      display: block;
      float: none;
    }
    .cancelbtn {
      width: 100%;
    }
  }
</style>
<?php
  if(isset($_POST['dangnhap'])){
    $email = $_POST['email'];
    $matkhau = md5($_POST['password']);
    $sql = "SELECT * FROM tbl_dangky WHERE email ='".$email."' AND matkhau ='".$matkhau."' LIMIT 1";
    $row = mysqli_query($mysqli,$sql);
    $count = mysqli_num_rows($row);
    if ($count > 0){
        $row_data = mysqli_fetch_array($row);
        $_SESSION['dangky'] = $row_data['tenkhachhang'];
        $_SESSION['id_khachhang'] = $row_data['id_dangky'];
        header("Location:index.php?quanly=giohang");
        echo '<p style="color:green">Đăng nhập thành công chọn giỏ hàng để tiếp tục đặt hàng !!!!!</p>' ;
        }else{
        echo '<p style="color:red">Mật khẩu hoặc tên đăng nhập sai!!!!</p>' ;
        }
    }
?>
<form action="" autocomplete="off" method="POST">
  <div class="imgcontainer">
    <img style="width: 20%;height: 20%;" src="../../images/avatar2.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="user"><b>Tên đăng nhập</b></label>
    <input type="text" placeholder="Nhập tên đăng nhập" name="email" required>

    <label for="password"><b>Mật khẩu</b></label>
    <input type="password" placeholder="Nhập mật khẩu" name="password" required>

    <button class="login" type="submit" name="dangnhap" value="Đăng nhập">Đăng Nhập</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>