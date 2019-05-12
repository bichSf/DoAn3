
<?php include '../autoload/autoload.php' ;
$level=$db->fetchAll("levels");

?>

<?php include '../layouts/header.php';?>


<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Trang chủ</a>
      </li>
      <li class="breadcrumb-item active">Chức vụ</li>

    </ol>

    <!-- Icon Cards-->
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-primary o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fas fa-fw fa-comments"></i>
            </div>
            <div class="mr-5">26 New Messages!</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="#">
            <span class="float-left">View Details</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-warning o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fas fa-fw fa-list"></i>
            </div>
            <div class="mr-5">11 New Tasks!</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="#">
            <span class="float-left">View Details</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-success o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fas fa-fw fa-shopping-cart"></i>
            </div>
            <div class="mr-5">123 New Orders!</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="#">
            <span class="float-left">View Details</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-danger o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fas fa-fw fa-life-ring"></i>
            </div>
            <div class="mr-5">13 New Tickets!</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="#">
            <span class="float-left">View Details</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
    </div>

    <!-- Area Chart Example-->
    <div class="card mb-3">
      <div class="card-header">
        <h1 class="fas fa-chart-area"> Danh sách danh mục

         <a href="levels_insert.php" class="btn btn-success" >Thêm mới</a></h1>

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
                  <th scope="col">ID</th>
                  <th scope="col">Chức vụ</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($level as $item): ?>
                  <tr>
                    <td><?php echo $item['id'] ?></td>
                    <td><?php echo $item['level'] ?></td>
                    <td>
                      <a class="btn btn-xs btn-info" href="levels_update.php?id= <?php echo $item['id']  ?>"><i class="fas fa-plus"></i>Sửa</a>
                      <a class="btn btn-xs btn-danger" href="levels_delete.php?id= <?php echo $item['id']  ?>"><i class="fas fa-times"></i>Xóa</a>

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