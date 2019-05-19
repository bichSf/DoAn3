<?php 
include '../autoload/autoload.php' ;?>
<?php 
$email=$_GET['email'];

if ($_SERVER["REQUEST_METHOD"]=="get")
{
//danh muc doi truong
  $data=[

    "email"=>gettInput("email2"),
    "password"=>gettInput("password")
  ];

  $error=[];

  if (getInput('password')=='')
    $error[0]="Hãy nhập password";
  if (empty($error))
  {
    $ischeck=$db->fetchOne("accounts","email='".$data['email2']."'");
    if (!isset($ischeck))
    {
      $_SESSION["error"]="Email đã tồn tại.";
    }
    else
    {
     //  $id_insert=$db->insert("accounts",$data);
     //  if ($id_insert>0)
     //  {
     //    $_SESSION["success"]="Tạo mới thành công.";
     //    redirectAdmin("acc_index.php");
     //  }
     //  else{
     //   $_SESSION["error"]="Tạo mới thất bại.";
     // }
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
      <form action="" method="post">
        <div class="form-group">
          <div class="text-center mb-4">
            <h4>Forgot your password?</h4>
            Enter your email address and we will send you instructions on how to reset your password.
          </div>
          <div class="clearfix">
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
          </div> 
          <div class="form-group row">
            <input type="email" name="email2" class="form-control" value="<?php echo $email ?>">
          </div>
          <div class="form-group row">
            <input type="text" class="form-control" name="password" placeholder="Password">
            <?php if(isset($error[1])) {?>
             <p class="text-danger"><?php echo $error[1]; ?></p>
           <?php  }?> 
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
      <a class="d-block small" href="../../public/frontend/login.php">Login Page</a>
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
