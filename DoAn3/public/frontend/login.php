<?php 
include '../autoload/autoload.php' ;

//danh muc doi truong
$leader=$db->fetchAll('accounts');
$stt=$db->fetchAll('statuses');


$data=[

	"email"=>postInput("email"),
	"password"=>postInput("password")
];
$error=[];

if ($_SERVER["REQUEST_METHOD"]=="POST")
{
	if (postInput("email")=="")
		$error[1]="Hãy nhập gmail";
	if (postInput("password")=="")
		$error[2]="Hãy nhập mật khẩu";


	if (empty($error))
	{

		$is_check=$db->fetchOne("accounts","email='".$data['email']."' AND password='".$data['password']."'");
		if (  $is_check !=NULL)
		{
			$_SESSION["name_user"]=$is_check['name'];
			$_SESSION["id_user"]=$is_check['id'];
			$_SESSION["level_user"]=$is_check['id_level'];
			
			echo "<script>alert('Đăng nhập thành công')</script>";
			if ($_SESSION["level_user"]==1) {
				header("location: ../../admin/modules/index.php");
			}
			if ($_SESSION["level_user"]==2) {
				header("location: ../../leader/modules/leader.php");
			}
		}
		else{
			$_SESSION["error"]="Đăng nhập thất bại.";
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Web SVTN DHBKHN</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="style.css">

	<!--===============================================================================================-->
</head>
<body style="background-color: rgba(0,0,0,0.1)">
	
	<section class="box-main1">
		

		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100">
					<form action="" method="POST" class="login100-form validate-form" style="background-color: rgba(0,0,0,0.1)">
						<span class="login100-form-title p-b-43">
							Login to continue
							<p style="color: red">Chỉ dành cho admin và đội trưởng</p>
						</span>

						<?php if (isset($_SESSION['success'])) {?>
							<div class="alert alert-success"></div>
							<strong style="color: green">Success!</strong><?php echo $_SESSION['success']; unset($_SESSION['success']) ?>
						<?php } ?>
						<?php if (isset($_SESSION['error'])): ?>
							<div class="alert alert-danger"></div>
							<strong style="color: red">Error!</strong><?php echo $_SESSION['error']; unset($_SESSION['error']) ?>
						<?php endif ?>

						<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
							<input class="input100" type="text" name="email" placeholder="Email">
							<?php if(isset($error[1])){?>
								<p class="text-danger"><?php echo $error[1]; ?></p>
							<?php } ?>
						</div>


						<div class="wrap-input100 validate-input" data-validate="Password is required">
							<input class="input100" type="password" name="password" placeholder="password">
							<?php if(isset($error[2])){?>
								<p class="text-danger"><?php echo $error[2]; ?></p>
							<?php } ?>
						</div>

						<div class="flex-sb-m w-full p-t-3 p-b-32" style="margin-top: 50px">
							<div class="contact100-form-checkbox">
								<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
								<label class="label-checkbox100" for="ckb1">
									Remember me
								</label>
							</div>

							<div>
								<a href="../../admin/modules/register.php" class="txt1">
									Register?/
								</a>
								&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="../../admin/modules/forgot-password.php" class="txt1">
									Forgot Password?
								</a>
							</div>
						</div>


						<div class="container-login100-form-btn">
							<button class="login100-form-btn">
								Login
							</button>
						</div>


					</form>

					<div class="login100-more" style="background-image: url('images/bgg.jpg');background-repeat:no-repeat; background-position:50px; margin-top:10px;">
						<div class="back" style="margin:0px 0px 0px 0px;"><a href="index.html"><img src="images/icons/back-icon.png" alt="back" title="Quay trở về" style=" width: 25px; height: 25px"></a></div>;
					</div>
				</div>
			</div>
		</div>
	</section>

	

	
	
	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
