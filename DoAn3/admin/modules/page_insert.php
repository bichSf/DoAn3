
<?php include '../autoload/autoload.php' ;

$data=[
 
  "name"=>postInput("inputName"),
  "history"=>postInput("inputHis"),
  "status"=>postInput("inputStt"),
  "id_leader"=>postInput("inputIdLeader"),
  "id_look_status"=>postInput("inputLookStt"),
  
];
$error=[];

if (postInput("inputName")=="")
  $error[1]="Hãy nhập tên đội";
if (postInput("inputHis")=="")
  $error[2]="Hãy nhập lịch sử đội";
if (postInput("inputIdLeader")=="")
  $error[3]="Hãy chọn tài khoản đội trưởng";
if (postInput("inputLookStt")=="")
  $error[4]="Hãy chọn trạng thái tài khoản";

if (empty($error))
{
  $id_insert=$db->insert("acount",$data);
   if (  $id_insert>0)
  {
    $_SESSION["success"]="Tạo mới thành công.";
    redirectAdmin("page_index.php");
  }
  else{
   $_SESSION["error"]="Tạo mới thất bại.";
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
      <li class="breadcrumb-item active"><a href="acc_index.php">Đội tình nguyện</a></li>
      <li class="breadcrumb-item active">Thêm mới</li>
    </ol>

    <!-- Area Chart Example-->
    <div class="card mb-3">
      <div class="card-header">
        <h1 class="fas fa-chart-area"> Thêm mới danh mục</h1>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form action="" method="POST" style="margin-left: 50px">

            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Tên đội</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="inputName" placeholder="1">
                
                <?php if(isset($error[1]))?>
                <p class="text-danger"><?php echo $error[1]; ?></p>

              </div>
            </div>

            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Lịch sử</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="inputHis" >
                <?php if(isset($error[2]))?>
                <p class="text-danger"><?php echo $error[2]; ?></p>
              </div>
            </div>

            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Trạng thái</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="inputStt" >
              </div>
            </div>   

           <div class="form-group row">
             <label class="col-sm-2 col-form-label">Đội trưởng</label>
             <div class="col-sm-8">
              <input type="text" class="form-control" name="inputIdLeader" >
              <?php if(isset($error[3]))?>
                <p class="text-danger"><?php echo $error[3]; ?></p>
            </div>
          </div>
          
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Trạng thái hoạt động</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" name="inputLookStt" >
              <?php if(isset($error[4]))?>
                <p class="text-danger"><?php echo $error[4]; ?></p>
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