
<?php include '../autoload/autoload.php' ;
$page=$db->fetchAll("team_pages");

?>

<?php include '../layouts/header.php';?>


<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Trang chủ</a>
      </li>
      <li class="breadcrumb-item active">Đội tình nguyện</li>
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
          
         <a href="page_insert.php" class="btn btn-success" >Thêm mới</a></h1>
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
                    <th scope="col" style="text-align: center">Tên đội</th>
                    <th scope="col" style="text-align: center">Lịch sử</th>
                    <th scope="col" style="text-align: center">Dòng trạng thái</th> 
                    <th scope="col" style="text-align: center">Hình ảnh</th> 
                    <th scope="col" style="text-align: center">Link</th> 
                    <th scope="col" style="text-align: center">Đội trưởng</th> 
                    <th scope="col" style="text-align: center">Trạng thái khóa</th> 
                    
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($page as $item): ?>
                    <tr>
                      <td><?php echo $item['id'] ?></td>
                      <td><?php echo $item['name'] ?></td>
                      <td><?php echo $item['history'] ?></td>
                      <td><?php echo $item['status'] ?></td>
                      <td><?php echo $item['image'] ?></td>
                      <td><?php echo $item['link'] ?></td>
                      <td><?php echo $item['id_leader'] ?></td>
                      <td><?php echo $item['id_lock_status'] ?></td>

                      <td>
                        <a class="btn btn-xs btn-info" href="page_update.php?id= <?php echo $item['id']  ?>"><i class="fas fa-plus"></i>Sửa</a>
                        <a class="btn btn-xs btn-danger" href="page_delete.php?id= <?php echo $item['id']  ?>"><i class="fas fa-times"></i>Xóa</a>

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
      
      <div class="page number">
        <nav aria-label="Page navigation example " style="float: right">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
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