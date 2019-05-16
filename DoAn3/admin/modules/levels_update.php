
<?php include '../autoload/autoload.php' ;
$id=intval(getInput('id'));
$edit=$db->fetchID('levels',$id);
if(empty($edit))
{
  $_SESSION["error"]="Dữ liệu không tồn tại.";
  redirectAdmin("levels_index.php");
}

if ($_SERVER["REQUEST_METHOD"]=="POST")
{

  $data=[
    "level"=>postInput("inputName")
  ];
  $error=[];
  if (postInput("inputName")=="")
    $error[1]="Hãy nhập tên chức vụ";
  if (empty($error))
  {
    if($edit['status']!=$data['status'])
    {
      $isset=$db->fetchOne("levels","level='".$data['level']."'");
      if (count($isset)>0)
      {
        $_SESSION["error"]="Danh mục đã tồn tại.";
      }
      else
      {
        $id_update=$db->update("levels",$data, array('id'=>$id));
        if (  $id_update>0)
        {
          $_SESSION["success"]="Cập nhật thành công.";
          redirectAdmin("levels_index.php");
        }
        else{
         $_SESSION["error"]="Cập nhật thất bại.";
         redirectAdmin("levels_index.php");
       }
     }
     
   }
   else
   {
     $id_update=$db->update("levels",$data, array('id'=>$id));
     if (  $id_update>0)
     {
      $_SESSION["success"]="Cập nhật thành công.";
      redirectAdmin("levels_index.php");
    }
    else{
     $_SESSION["error"]="Cập nhật thất bại.";
     redirectAdmin("levels_index.php");
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
      <li class="breadcrumb-item active"><a href="levels_index.php">Chức vụ</a></li>
    </ol>

    <!-- Area Chart Example-->
    <div class="card mb-3">
      <div class="card-header">
        <h1 class="fas fa-chart-area"> Sửa danh mục</h1>
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
            <label  class="col-sm-2 col-form-label">Tên chức vụ</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="inputName" placeholder="admin" value="<?php echo $edit['level'] ?>">

            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-8">
             <button type="submit" class="btn btn-success" name="add" style="margin-left: 50px" >Sửa</button>
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