
<?php include '../autoload/autoload.php' ;
$sql="select * from accounts where id_level=1";
if(isset($_GET['p']))
{
  $p=$_GET['p'];
}
else {$p=1;}
$total=count($db->fetchLeaderOrAdmin("accounts",1));
$acc=$db->fetchJones("accounts",$sql,$total,$p,3,true);
$sotrang=$acc["page"];
unset($acc["page"]);
$path=$_SERVER['SCRIPT_NAME'];  

$stt=$db->fetchAll("statuses");
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
      <li class="breadcrumb-item active">Tài khoản</li>
    </ol>

    <?php include '../layouts/info.php';?>


    <!-- Area Chart Example-->
    <div class="card mb-3">
      <div class="card-header">
        <h1 class="fas fa-chart-area"> Danh sách danh mục

         <a href="acc_insert.php" class="btn btn-success" >Thêm mới</a></h1>

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
                  <th scope="col" style="text-align: center">Họ và tên</th>
                  <th scope="col" style="text-align: center">Ngày sinh</th>
                  <th scope="col" style="text-align: center">Giới tính</th>
                  <th scope="col" style="text-align: center">Quê quán</th> 
                  <th scope="col" style="text-align: center">Gmail</th> 
                  <th scope="col" style="text-align: center">Số điện thoại</th> 
                  <th scope="col" style="text-align: center">Chức vụ</th> 
                  <th scope="col" style="text-align: center">Tên đăng nhập</th> 
                  <th scope="col" style="text-align: center">Trạng thái</th> 
                  <th scope="col" style="text-align: center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ( $acc as $item): ?>
                  <?php foreach ( $stt as $item1): ?>
                    <?php foreach ( $level as $item2): ?>
                      <?php if ( $item['id_level']==$item2['id']): ?>
                        <?php if ( $item['state']==$item1['id']): ?>

                          <tr>
                            <td><?php echo $item['id'] ?></td>
                            <td><?php echo $item['name'] ?></td>
                            <td><?php echo $item['birth_date'] ?></td>
                            <td><?php echo $item['gender'] ?></td>
                            <td><?php echo $item['hometown'] ?></td>
                            <td><?php echo $item['email'] ?></td>
                            <td><?php echo $item['phone'] ?></td>
                            <td><?php echo $item2['level'] ?></td>
                            <td><?php echo $item['user_name'] ?></td>
                            <td><?php echo $item1['status']?></td>

                            <td>
                              <a class="btn btn-xs btn-info" href="acc_update.php?id= <?php echo $item['id']  ?>"><i class="fas fa-plus"></i>Sửa</a>
                              <a class="btn btn-xs btn-danger" href="acc_delete.php?id= <?php echo $item['id']  ?>"><i class="fas fa-times"></i>Xóa</a>

                            </td>
                          </tr>
                        <?php endif ?>
                      <?php endif ?>
                    <?php endforeach ?>
                  <?php endforeach ?>
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
            <?php for ($i=1; $i<=$sotrang; $i++): ?>
              <li class="page-item"><a class="page-link" href="<?php echo $path?>?p=<?php echo $i?>"><?php echo $i ?></a></li>
            <?php endfor; ?>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <!-- /.container-fluid -->
  <?php include '../layouts/footer.php' ?>