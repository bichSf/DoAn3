<?php include '../autoload/autoload.php' ;
if ($_SERVER["REQUEST_METHOD"]=="POST")
{

  $data=[
    "name"=>postInput('inputName'),
    "birth_date"=>postInput('inputDoB'),
    "gender"=>postInput('gt'),
    "hometown"=>postInput('inputHomeT'),
    "email"=>postInput('inputEmail'),
    "phone"=>postInput('inputPhone'),
    "id_level"=>2,
    "user_name"=>postInput('inputUserName'),
    "password"=>postInput('inputPassword'),
  ];

   $data1=[
      "class"=>postInput('inputClass'),
      "id_school"=>postInput('inputSchool')
   ];

   $data2=[
    "name"=>postInput('inputNamePage')
   ];
  
  $error=[];
  if (postInput('inputName')=='')
    $error[1]="Hãy nhập tên người sở hữu tài khoản";
  if (postInput('inputDoB')=='')
    $error[2]="Hãy nhập ngày sinh người sở hữu tài khoản";
  if (postInput('inputHomeT')=='')
    $error[3]="Hãy nhập quê quán người sở hữu tài khoản";
  if (postInput('inputEmail')=='')
    $error[4]="Hãy nhập email người sở hữu tài khoản";
  if (postInput('inputPhone')=='')
    $error[5]="Hãy nhập số điện thoại người sở hữu tài khoản";
  if (postInput('inputUserName')=='')
    $error[6]="Hãy chọn tên tài khoản";
  if (postInput('inputPassword')=='')
  {
    $error[7]="Hãy nhập mật khẩu tài khoản";
  }
  else
  {
    $data['password']=MDSpostInput('inputPassword');
  }
   if (postInput('inputClass')=='')
    $error[8]="Hãy nhập lớp đang theo học";
   if (postInput('inputSchool')=='')
    $error[9]="Hãy chọn viện đang theo học";
   if (postInput('inputNamePage')=='')
    $error[10]="Hãy nhập tên đội của bạn";

  if (empty($error))
  {
    $isset1=$db->fetchOne("accounts","user_name='".$data['user_name']."'");
    $isset2=$db->fetchOne("accounts","email='".$data['email']."'");
    $isset3=$db->fetchOne("accounts","phone='".$data['phone']."'");
    $isset4=$db->fetchOne("team_pages","name='".$data['name']."'");

    if ((count($isset1)>0) ||(count($isset2)>0)||(count($isset3)>0)||(count($isset4)>0))
    {
      if (count($isset1)>0)
      {
        $_SESSION["error"]="UserName đã tồn tại.";
      }
      if (count($isset2)>0)
      {
        $_SESSION["error"]="Gmail đã tồn tại.";
      }
      if (count($isset3)>0)
      {
        $_SESSION["error"]="Số điện thoại đã tồn tại.";
      }
      if (count($isset4)>0)
      {
        $_SESSION["error"]="Tên đội đã tồn tại.";
      }
    }
    else
    {
      $id_insert1=$db->insert("accounts",$data);
      $id_insert2=$db->insert("leaders",$data1);
      $id_insert3=$db->insert("team_pages",$data2);
      if ($id_insert1>0 && $id_insert2>0 && $id_insert3>0)
      {
        $_SESSION["success"]="Tạo mới thành công.";
        header('location: ../../public/frontend/page_blank.php');
      }
      else{
       $_SESSION["error"]="Tạo mới thất bại.";
     }
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

  <title>Register</title>

  <!-- Custom fonts for this template-->
  <link href="../../public/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../../public/admin/css/sb-admin.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="../../public/frontend/images/icons/favicon.ico"/>
</head>

<body class="bg-dark" style="background-repeat:no-repeat; 
background-size: cover; background-image: url('../../public/frontend/images/bgg1.jpg'">

<div class="container">
  <div class="card card-register mx-auto mt-5">
    <div class="card-header">Tạo tài khoản mới</div>
    <div class="card-body">
      <form action="" method="POST" accept-charset="utf-8">
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
             <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Họ tên</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="inputName" placeholder="Trần Thị Bích">
                <?php if(isset($error[1])) {?>
                  <p class="text-danger"><?php echo $error[1]; ?></p>
                <?php  }?>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Ngày sinh</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="inputDoB" placeholder="1998/03/30">
                <?php if(isset($error[2])) {?>
                  <p class="text-danger"><?php echo $error[2]; ?></p>
                <?php  }?>
              </div>
            </div>
            <!-- <fieldset class="form-group">
              <div class="row">
                <legend class="col-form-label col-sm-4 pt-0">Giới tính</legend>
                <div class="col-sm-8">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gt" id="nam" value="Nam" checked>
                    <label class="form-check-label" for="gridRadios1">
                      Nam
                    </label>
                    &nbsp;  &nbsp;  &nbsp;  &nbsp;
                    <input class="form-check-input" type="radio" name="gt" id="nu" value="Nữ">
                    <label class="form-check-label" for="gridRadios2">
                     Nữ
                   </label>
                 </div>
               </div>
             </div>
                       </fieldset> -->

           <div class="form-group row">
             <label class="col-sm-4 col-form-label">Quê quán</label>
             <div class="col-sm-8">
              <input type="text" class="form-control" name="inputHomeT" placeholder="Bắc Giang">
               <?php if(isset($error[3])) {?>
                <p class="text-danger"><?php echo $error[3]; ?></p>
              <?php  }?>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-4 col-form-label">Email</label>
            <div class="col-sm-8">
              <input type="email" class="form-control" name="inputEmail" placeholder="Email">
              <?php if(isset($error[4])) {?>
                <p class="text-danger"><?php echo $error[4]; ?></p>
              <?php  }?>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Điện thoại</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" name="inputPhone" placeholder="Phone number">
               <?php if(isset($error[5])) {?>
                <p class="text-danger"><?php echo $error[5]; ?></p>
              <?php  }?>
            </div>
          </div>
          <div class="form-group row">
           <label class="col-sm-4 col-form-label">User name</label>
           <div class="col-sm-8">
            <input type="text" class="form-control" name="inputUserName" placeholder="bichsf">
            <?php if(isset($error[6])) {?>
              <p class="text-danger"><?php echo $error[6]; ?></p>
            <?php  }?>
          </div>
        </div>

        <div class="form-group row">
         <label class="col-sm-4 col-form-label">Password</label>
         <div class="col-sm-4">
          <input type="password" class="form-control" name="inputUserName" placeholder="Password">
           <?php if(isset($error[7])) {?>
              <p class="text-danger"><?php echo $error[7]; ?></p>
            <?php  }?>
        </div>
        <div class="col-sm-4">
          <input type="password" class="form-control" name="inputUserName" placeholder="Confirm password">
           <?php if(isset($error[7])) {?>
              <p class="text-danger"><?php echo $error[7]; ?></p>
            <?php  }?>
        </div>
      </div>
      <div class="form-group row">
        <label  class="col-sm-4 col-form-label">Tên lớp</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="inputClass" placeholder="1">
          <?php if(isset($error[8])) {?>
                <p class="text-danger"><?php echo $error[8]; ?></p>
                <?php } ?>
        </div>
      </div>

      <div class="form-group row">
        <label  class="col-sm-4 col-form-label">Khoa viện</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="inputSchool" placeholder="IT1">
          <?php if(isset($error[9])) {?>
                <p class="text-danger"><?php echo $error[9]; ?></p>
                <?php } ?>
        </div>
      </div>
      <div class="form-group row">
        <label  class="col-sm-4 col-form-label">Tên đội tình nguyện</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="inputNamePage" placeholder="">
          <?php if(isset($error[10])) {?>
                <p class="text-danger"><?php echo $error[10]; ?></p>
                <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <a class="btn btn-primary btn-block" href="">Register</a>
</form>
<div class="text-center">
  <a class="d-block small mt-3" href="../../public/frontend/login.php"  >Login Page</a>
  <a class="d-block small" href="forgot-password.php"  >Forgot Password?</a>
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
