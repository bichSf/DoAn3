
<?php include '../autoload/autoload.php' ;
$stt=$db->fetchAll("statuses");

?>

<?php include '../layouts/header.php';?>


<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Trang chủ</a>
      </li>
      <li class="breadcrumb-item active">Trạng thái hoạt động</li>
    </ol>

<?php include '../layouts/info.php';?>
  
    <!-- Area Chart Example-->
    <div class="card mb-3">
      <div class="card-header">
        <h1 class="fas fa-chart-area"> Danh sách danh mục
          
         <a href="status_insert.php" class="btn btn-success" >Thêm mới</a></h1>
        <div class="clearfix">

          <?php if (isset($_SESSION["success"])) {?>
           <div class="alert alert-success">
             <?php echo $_SESSION["success"];unset($_SESSION["success"]);  ?>
           </div>
         <?php } ?>
         <?php if (isset($_SESSION['error'])) {?>
           <div class="alert alert-danger">
             <?php echo $_SESSION['error'];unset($_SESSION["error"]); ?>
           </div>
         <?php } ?>
       </div>
       
          <div class="class row">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th scope="col" style="text-align: center">ID</th>
                      <th scope="col" style="text-align: center">Trạng thái khóa</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($stt as $item): ?>
                      <tr>
                        <td><?php echo $item['id'] ?></td>
                        <td><?php echo $item['status'] ?></td>
                        <td>
                          <a class="btn btn-xs btn-info" href="status_update.php?id= <?php echo $item['id']  ?>"><i class="fas fa-plus"></i>Sửa</a>
                          <a class="btn btn-xs btn-danger" href="status_delete.php?id= <?php echo $item['id']  ?>"><i class="fas fa-times"></i>Xóa</a>

                        </td>
                      </tr>
                    <?php endforeach ?>

                  </tbody>
                </table>
              </div>  
            </div>
          </div>

          <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

        
        <!-- /.container-fluid -->
        <?php include '../layouts/footer.php' ?>