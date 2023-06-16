<?php
session_start();
require_once "connection.php";
// neu nguoi dung da dang nhap roi thi ho khong phai dang nhap
if(isset($_SESSION['user'])){
    header("location: quantri.php");
    die;
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM userr WHERE username like '$username' ";
    // chuan bi
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    //truong hop username dung
    if($user){
      if($user['password']==$password && $user['username']==$username ){
        $msg = "đăng nhập thành công";
        header("location: quantri.php?msg=$msg");
        die;
      }
      else{
        $errors['password'] = "mat khau khong dung";
      }
    }
    else {
      $errors['username'] = "tai khoan khong dung";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .bg-image-vertical {
        position: relative;
        overflow: hidden;
        background-repeat: no-repeat;
        background-position: right center;
        background-size: auto 100%;
}

@media (min-width: 1025px) {
.h-custom-2 {
height: 100%;
}
}
    </style>
</head>
<body>
<section class="vh-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">

        <div class="px-5 ms-xl-4">
          <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
          <span class="h1 fw-bold mb-0">Logo</span>
        </div>

        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

          <form style="width: 23rem;" action="" method="POST">

            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Login</h3>

            <div class="form-outline mb-4">
              <input type="text"  class="form-control form-control-lg" name="username" >
              <label class="form-label" >User name</label>
              <span style="color:red">
              <?php echo $errors['username'] ?? '' ?>
              </span>
            </div>

            <div class="form-outline mb-4">
              <input type="password"  class="form-control form-control-lg" name="password" >
              <label class="form-label">Password</label>
              <span style="color:red">
              <?php echo $errors['password'] ?? '' ?>
              </span>
              <br>
            </div>

            <div class="pt-1 mb-4">
              <button class="btn btn-info btn-lg btn-block" type="submit" name="login">Login</button>
            </div>

          </form>

        </div>

      </div>
    </div>
  </div>
</section>
</body>
</html>