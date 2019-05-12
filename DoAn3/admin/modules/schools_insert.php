
<?php include '../autoload/autoload.php' ;
if ($_SERVER["REQUEST_METHOD"]=="POST")
{
  $data=[
    "name"=>postInput("inputName")
  ];
  $error=[];
  if (postInput("inputName")=="")
    $error[1]="Hãy nhập tên khoa viện";

  if (empty($error))
  {
    $isset1=$db->fetchOne("schools","name='".$data['name']."'");
    if (count($isset1)>0)
    {
      $_SESSION["error"]="Tên khoa viện đã tồn tại.";
    }
    else
    {
      $id_insert=$db->insert("schools",$data);
      if (  $id_insert>0)
      {
        $_SESSION["success"]="Tạo mới thành công.";
        redirectAdmin("schools_index.php");
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
      <li class="breadcrumb-item active"><a href="schools_index.php">Khoa viện</a></li>
      <li class="breadcrumb-item">Thêm mới</li>
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
              <label  class="col-sm-2 col-form-label">Tên khoa viện</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="inputName" placeholder="Viện công nghệ thông tin và truyền thông">
                <?php if(isset($error[1])){?>
                  <p class="text-danger"><?php echo $error[1]; ?></p>
                <?php } ?>
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