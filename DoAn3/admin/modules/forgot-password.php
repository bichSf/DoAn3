<?php 
include '../autoload/autoload.php' ;

//danh muc doi truong
$data=[

  "email"=>getInput("email")
];

$error=[];

if ($_SERVER["REQUEST_METHOD"]=="GET")
{
  if (getInput('email')=="")
    $error[1]="Hãy nhập email";

  if (empty($error))
  {

    $is_check=$db->fetchOne("accounts","email='".$data['email']."'");
    if (  $is_check !=NULL)
    {
      $email=$is_check['email'];
      $pass=$is_check['password'];

      $_SESSION['success']='<p>Mời check email của bạn: <span>$mail</span> để lấy lại mật khẩu</p>';

      $to=$email;
      $sj="Password reset link (SVTN HUST)";
      $mess_body='
      Hello '.$_SESSION['name_user'].',
      Bạn yêu cầu cấp lại mật khẩu!
      Click vào link dưới đây để xác nhận:';
      
      //mail($to,$sj,$mess_body);
      //header("location: ../../public/frontend/login.php");
    }
    else{
      $_SESSION["error"]="Email không tồn tại.";
    }
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Forgot Password</title>

  <!-- Custom fonts for this template-->
  <link href="../../public/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../../public/admin/css/sb-admin.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="../../public/frontend/images/icons/favicon.ico"/>

</head>

<body class="bg-dark" style="background-repeat:no-repeat; 
background-size: cover; background-image: url('../../public/frontend/images/bgg1.jpg'">

<div class="container">
  <div class="card card-login mx-auto mt-5">
    <div class="card-header">Reset Password</div>
    <div class="card-body">
      <form action="" method="GET">
        <div class="form-group">
          <div class="text-center mb-4">
            <h4>Forgot your password?</h4>
            Enter your email address and we will send you instructions on how to reset your password.
          </div>

          <?php if (isset($_SESSION['success'])) {?>
            <div class="alert alert-success">
              <strong style="color: green">Success!</strong><?php echo $_SESSION['success']; unset($_SESSION['success']) ?>
            </div>
          <?php } ?>
          <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger" style="margin-top: -20px">
              <strong style="color: red">Error!</strong><?php echo $_SESSION['error']; unset($_SESSION['error']) ?>
            </div>
          <?php endif ?>
          <div class="form-label-group">
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Enter email address" >
            <label for="inputEmail">Enter email address</label>  
            <?php if(isset($error[1])){?>
              <p class="text-danger"><?php echo $error[1]; ?></p>
            <?php } ?> 
          </div>
          <div class="container-login100-form-btn">
            <button class="login100-form-btn btn btn-success" style="margin-left: 110px; margin-top: 20px">
              Reset Password
            </button>
          </div>
        </div>
      </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <a class="d-block small" href="../../public/frontend/login.html">Login Page</a>
        </div>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="../../public/admin/vendor/jquery/jquery.min.js"></script>
<script src="../../public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../../public/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
