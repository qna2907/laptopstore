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
  button {
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
  if(isset($_POST['doimatkhau'])){
    $taikhoan = $_POST['email'];
    $matkhau_cu = md5($_POST['old_password']);
    $matkhau_moi = md5($_POST['new_password']);
    $sql = "SELECT * FROM tbl_dangky WHERE email = '".$taikhoan."' AND matkhau = '".$matkhau_cu."' LIMIT 1";
    $row = mysqli_query($mysqli,$sql);
    $count = mysqli_num_rows($row);
    if ($count > 0){
        $sql_update = mysqli_query($mysqli,"UPDATE tbl_dangky SET matkhau='".$matkhau_moi."'");
        echo '<p style="color:green">Đổi mật khẩu thành công!!!!</p>' ;
        }else{
        echo '<p style="color:red">Tên đăng nhập hoặc mật khẩu không đúng yêu cầu nhập lại!!!!</p>' ;
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

    <label for="old_password"><b>Mật khẩu cũ</b></label>
    <input type="password" placeholder="Nhập mật khẩu cũ" name="old_password" required>

    <label for="new_password"><b>Mật khẩu mới</b></label>
    <input type="password" placeholder="Nhập mật khẩu mới" name="new_password" required>

    <button type="submit" name="doimatkhau" value="Đổi mật khẩu">Đổi Mật Khẩu</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>