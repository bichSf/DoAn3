
<?php 
include '../autoload/autoload.php' ;

//danh muc doi truong
$leader=$db->fetchLeaderOrAdmin('accounts',2);
$stt=$db->fetchAll('statuses');

if ($_SERVER["REQUEST_METHOD"]=="POST")
{
  $data=[

    "name"=>postInput("inputName"),
    "history"=>postInput("inputHis"),
    "status"=>postInput("inputStt"),
    "image"=>postInput("inputImg"),
    "link"=>postInput("inputLink"),
    "id_leader"=>postInput('$id'),
    "id_look_status"=>postInput("inputLookStt"),

  ];
  $error=[];

  if (postInput("inputName")=="")
    $error[1]="Hãy nhập tên đội";
  if (postInput("inputHis")=="")
    $error[2]="Hãy nhập lịch sử đội";
  if (postInput("inputIdLeader")=="")
    $error[3]="Hãy chọn tài khoản đội trưởng";
  if (postInput("inputStt")=="")
    $error[4]="Hãy chọn trạng thái đội";
  if (postInput("inputImg")=="")
    $error[5]="Hãy chọn ảnh của đội";
  if (postInput("inputLink")=="")
    $error[6]="Hãy chọn link liên kết của đội";

  if (empty($error))
  {
    $isset1=$db->fetchOne("team_pages","name='".$data['name']."'");
    $isset2=$db->fetchOne("team_pages","link='".$data['link']."'");
    if ((count($isset1)>0) ||(count($isset2)>0))
    {
      if (count($isset1)>0)
      {
        $_SESSION["error"]="Tên đội đã tồn tại.";
      }
      if (count($isset2)>0)
      {
        $_SESSION["error"]="Link đội đã tồn tại.";
      }
    }
    else
    {
      $id_insert=$db->insert("team_pages",$data);
      if (  $id_insert>0)
      {
        $_SESSION["success"]="Tạo mới thành công.";
        redirectAdmin("page_index.php");
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
      <li class="breadcrumb-item active"><a href="page_index.php">Đội tình nguyện</a></li>
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
          <form action="" method="POST" enctype="multipart/form-data" style="margin-left: 50px">

            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Tên đội</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="inputName" placeholder="1">
                
                <?php if(isset($error[1])){?>
                  <p class="text-danger"><?php echo $error[1]; ?></p>
                <?php } ?>
              </div>
            </div>

            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Lịch sử</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="inputHis" >
                <?php if(isset($error[2])){?>
                  <p class="text-danger"><?php echo $error[2]; ?></p>
                <?php } ?>
              </div>
            </div>

            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Trạng thái</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="inputStt" >
                <?php if(isset($error[4])){?>
                  <p class="text-danger"><?php echo $error[4]; ?></p>
                <?php } ?>
              </div>
            </div>   
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Hình ảnh</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="inputImg" >
                <?php if(isset($error[5])){?>
                  <p class="text-danger"><?php echo $error[5]; ?></p>
                <?php } ?>
              </div>
            </div>   
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Link</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="inputLink" >
                
                <?php if(isset($error[6])){?>
                  <p class="text-danger"><?php echo $error[6]; ?></p>
                <?php } ?>
              </div>
            </div>   

            <div class="form-group row">
             <label class="col-sm-2 col-form-label">Đội trưởng</label>
             <div class="col-sm-8">
              <select class="form-control col-md-12" name="inputIdLeader" id="">
                  <option value="">-Chọn đội trưởng</option>
                  <?php foreach ($leader as $item): ?>
                    <option value="<?php echo $item['id'] ?>"> <?php echo $item['name']  ?></option>
                  <?php endforeach ?>
                </select>
              
              <?php if(isset($error[3])){?>
                <p class="text-danger"><?php echo $error[3]; ?></p>
              <?php } ?>
            </div>
          </div>
          
          <fieldset class="form-group">
            <div class="row">
              <legend class="col-form-label col-sm-2 pt-0">Trạng thái hoạt động</legend>
              <div class="col-sm-8">
                <?php foreach ($stt as $item): ?>
                   <div class="form-check">
                  <input class="form-check-input" type="radio" name="cv" id="hdong" value="option3" checked>
                  <label class="form-check-label" for="gridRadios3"><?php echo $item['status'] ?></label>
                  <?php $id=$item['id']; ?>
                </div>
                <?php endforeach ?>
              </div>
            </div>
          </fieldset>

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