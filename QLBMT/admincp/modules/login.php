<?php
  session_start();
  include("../config/config.php");
  if(isset($_POST['dangnhap'])){
    $taikhoan = $_POST['user'];
    $matkhau = md5($_POST['password']);
    $sql = "SELECT * FROM tbl_admin WHERE user = '".$taikhoan."' AND password = '".$matkhau."' LIMIT 1";
    $row = mysqli_query($mysqli,$sql);
    $count = mysqli_num_rows($row);
    if ($count > 0){
      $_SESSION['dangnhap'] = $taikhoan;
      header("Location:../modules/index.php");
    }else{
      echo '<script>alert("Tài khoản hoặc mật khẩu không đúng, vui lòng nhập lại.")</script>' ;
      header("Location:login.php");
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/stylelogin.css">
    <title>Login</title>
</head>
<body>
<form action="" autocomplete="off" method="post">
  <div class="imgcontainer">
    <img style="width: 20%;height: 20%;" src="../images/avatar2.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="user"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="user" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <button type="submit" name="dangnhap" value="Đăng nhập">Đăng Nhập</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>