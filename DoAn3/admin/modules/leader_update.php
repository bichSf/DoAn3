
<?php include '../autoload/autoload.php' ;
$id=intval(getInput('id'));
$edit=$db->fetchID('leaders',$id);
$sc=$db->fetchAll('schools');

if(empty($edit))
{
  $_SESSION["error"]="Dữ liệu không tồn tại.";
   redirectAdmin("leader_index.php");
}
if ($_SERVER["REQUEST_METHOD"]=="POST")
{
  $data=[
    "class"=>postInput("inputClass"),
    "id_school"=>postInput("inputIDS"),
  ];

  $error=[];
  if (postInput("inputClass")=="")
    $error[0]="Hãy nhập tên lớp mà đội trưởng học";
  if (postInput("inputIDS")=="")
    $error[1]="Hãy chọn id viện mà đội trưởng thuộc";

  if (empty($error))
  {
    $id_update=$db->update("leaders",$data, array('id'=>$id));
    if ($id_update>0)
    {
      $_SESSION["success"]="Cập nhật thành công.";
      redirectAdmin("leader_index.php");
    }
    else{
     $_SESSION["error"]="Cập nhật thất bại.";
     redirectAdmin("leader_index.php");
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
      <li class="breadcrumb-item active"><a href="acc_index.php">Đội trưởng</a></li>
      <li class="breadcrumb-item active">Sửa</li>
    </ol>

    <!-- Area Chart Example-->
    <div class="card mb-3">
      <div class="card-header">
        <h1 class="fas fa-chart-area"> Sửa danh mục</h1>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form action="" method="POST" style="margin-left: 50px">
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Tên lớp</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="inputClass" placeholder="1" value="<?php echo $edit['class'] ?>">
              </div>
            </div>

            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">ID khoa viện</label>
              <select class="form-control col-md-8" name="inputIdLeader" id="">
                  <option value="">-Chọn Khoa viện</option>
                  <?php foreach ($sc as $item): ?>
                    <option value="<?php echo $item['id'] ?>"> <?php echo $item['name']  ?></option>
                  <?php endforeach ?>
                </select>
              
            </div>
            
            <div class="form-group row">
              <div class="col-sm-8">
               <button type="submit" class="btn btn-success" name="add" style="margin-left: 50px">Sửa</button>
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