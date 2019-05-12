
<?php include '../autoload/autoload.php' ;
if ($_SERVER["REQUEST_METHOD"]=="POST")
{

  $data=[
    "name"=>postInput('inputName'),
    "birth_date"=>postInput('inputDoB'),
    "gender"=>postInput('nam'),
    "hometown"=>postInput('inputHomeT'),
    "email"=>postInput('inputEmail'),
    "phone"=>postInput('inputPhone'),
    "id_level"=>postInput('inputName'),
    "user_name"=>postInput('inputUserName'),
    "password"=>postInput('inputPassword')
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
    $error[7]="Hãy nhập mật khẩu tài khoản";

  if (empty($error))
  {
    $isset1=$db->fetchOne("accounts","user_name='".$data['user_name']."'");
    $isset2=$db->fetchOne("accounts","email='".$data['email']."'");
    $isset3=$db->fetchOne("accounts","phone='".$data['phone']."'");
    if ((count($isset1)>0) ||(count($isset2)>0)||(count($isset3)>0))
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
    }
    else
    {
      $id_insert=$db->insert("accounts",$data);
      if (  $id_insert>0)
      {
        $_SESSION["success"]="Tạo mới thành công.";
        redirectAdmin("acc_index.php");
      }
      else{
       $_SESSION["error"]="Tạo mới thất bại.";
     }
   }
 }
}
?>

<?php include '../layouts/header.php';?>
<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Trang chủ</a>
      </li>
      <li class="breadcrumb-item active"><a href="acc_index.php">Tài khoản</a></li>
      <li class="breadcrumb-item active">Thêm mới</li>
    </ol>

    <!-- Area Chart Example-->
    <div class="card mb-3">
      <div class="card-header">
        <h1 class="fas fa-chart-area"> Thêm mới danh mục</h1>
      </div>
        <div class="clearfix">
         <?php if (isset($_SESSION['error'])) {?>
           <div class="alert alert-danger">
             <?php echo $_SESSION['error'];unset($_SESSION["error"]); ?>
           </div>
         <?php } ?>
       </div>
      <div class="row">
        <div class="col-md-12">
          <form action="" method="POST" style="margin-left: 50px">

            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Họ tên</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="inputName" placeholder="Trần Thị Bích">
                <?php if(isset($error[1])) {?>
                  <p class="text-danger"><?php echo $error[1]; ?></p>
                <?php  }?>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Ngày sinh</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="inputDoB" placeholder="1998/03/30">
                <?php if(isset($error[2])) {?>
                  <p class="text-danger"><?php echo $error[2]; ?></p>
                <?php  }?>
              </div>
            </div>
            <fieldset class="form-group">
              <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Giới tính</legend>
                <div class="col-sm-8">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gt" name="nam" value="option1" checked>
                    <label class="form-check-label" for="gridRadios1">
                      Nam
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gt" id="nu" value="option2">
                    <label class="form-check-label" for="gridRadios2">
                     Nữ
                   </label>
                 </div>
               </div>
             </div>
           </fieldset>

           <div class="form-group row">
             <label class="col-sm-2 col-form-label">Quê quán</label>
             <div class="col-sm-8">
              <input type="text" class="form-control" name="inputHomeT" placeholder="Bắc Giang">
              <?php if(isset($error[3])) {?>
                <p class="text-danger"><?php echo $error[3]; ?></p>
              <?php  }?>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-8">
              <input type="email" class="form-control" name="inputEmail" placeholder="Email">
              <?php if(isset($error[4])) {?>
                <p class="text-danger"><?php echo $error[4]; ?></p>
              <?php  }?>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Số điện thoại</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" name="inputPhone" placeholder="Phone number">
              <?php if(isset($error[5])) {?>
                <p class="text-danger"><?php echo $error[5]; ?></p>
              <?php  }?>
            </div>
          </div>
          <fieldset class="form-group">
            <div class="row">
              <legend class="col-form-label col-sm-2 pt-0">Chức vụ</legend>
              <div class="col-sm-8">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="cv" id="admin" value="option3" checked>
                  <label class="form-check-label" for="gridRadios3">Leader</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="cv" id="leader" value="option4">
                  <label class="form-check-label" for="gridRadios4">Admin</label>
                </div>
              </div>
            </div>
          </fieldset>

          <div class="form-group row">
           <label class="col-sm-2 col-form-label">User name</label>
           <div class="col-sm-8">
            <input type="text" class="form-control" name="inputUserName" placeholder="bichsf">
            <?php if(isset($error[6])) {?>
              <p class="text-danger"><?php echo $error[6]; ?></p>
            <?php  }?>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Mật khẩu</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="inputPassword" placeholder="Password">
            <?php if(isset($error[7])) {?>
              <p class="text-danger"><?php echo $error[7]; ?></p>
            <?php  }?>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-8">
           <button type="submit" class="btn btn-success" name="add" style="margin-left: 50px">Thêm</button>
         </div>
       </div>
     </form>
   </div>
 </div>
 <div class="card-body">
  <canvas id="myAreaChart" width="100%" height="30"></canvas>
</div>
<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>

<div class="page number">
  <nav aria-label="Page navigation example " style="float: right">
    <ul class="pagination">
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>

      <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
  </nav>
</div>
</div>
<!-- /.container-fluid -->
<?php include '../layouts/footer.php' ?>