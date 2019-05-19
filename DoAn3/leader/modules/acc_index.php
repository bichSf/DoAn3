
<?php include '../autoload/autoload.php' ;
$sql="select *from accounts where id = '".$_SESSION["id_user"]."'";
$acc=$db->fetchsql($sql);
$leader=$db->fetchAll("leaders");
$school=$db->fetchAll("schools");
$page=$db->fetchAll("team_pages");
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
      <li class="breadcrumb-item active">Đội trưởng</li>
    </ol>

    <?php include '../layouts/info.php';?>

    <!-- Area Chart Example-->
    <div class="card mb-3">
      <div class="card-header">
        <h1 class="fas fa-chart-area"> Danh sách danh mục</h1>

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
                 <th scope="col">Lớp</th>
                 <th scope="col">Viện</th>
                 <th scope="col">Đội trưởng đội</th>
                 <th scope="col">State</th>

                 <th scope="col">Action</th>
               </tr>
             </thead>
             <tbody>
              <?php foreach ($acc as $item1) : ?>
                <?php foreach ($leader as $item): ?>
                  <?php foreach ($school as $item2): ?>
                    <?php foreach ($page as $item3): ?>
                      <?php foreach ($level as $item4): ?>
                        <?php if($item1['id_level']==$item4['id']): ?>
                          <?php if (($item['id_acc']==$item1['id'])&&($item['id_school']==$item2['id'])&&($item3['id_leader']==$item['id'])): ?>
                          <tr>
                            <td><?php echo $item1['id'] ?></td>
                            <td><?php echo $item1['name'] ?></td>
                            <td><?php echo $item1['birth_date'] ?></td>
                            <td><?php echo $item1['gender'] ?></td>
                            <td><?php echo $item1['hometown'] ?></td>
                            <td><?php echo $item1['email'] ?></td>
                            <td><?php echo $item1['phone'] ?></td>
                            <td><?php echo $item4['level'] ?></td>
                            <td><?php echo $item1['user_name'] ?></td>
                            <td ><?php echo $item['class'] ?></td>
                            <td><?php echo $item2['name'] ?></td>
                            <td><?php echo $item3['name'] ?></td>
                            <td><?php if($item1['state']==0) echo "Hoạt động"; elseif ($item1['state']==1) echo "Bị khóa"; else echo "Tự khóa";?></td>

                            <td>
                              <a class="btn btn-xs btn-info" href="acc_update.php?id= <?php echo $item['id_acc']  ?>"><i class="fas fa-plus"></i>Sửa</a>
                              <a class="btn btn-xs btn-danger" href="acc_delete.php?id= <?php echo $item['id_acc']  ?>"><i class="fas fa-times"></i>Xóa</a>

                            </td>
                          </tr>
                        <?php endif ?>
                      <?php endif ?>
                    <?php endforeach ?>
                  <?php endforeach ?>
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


<!-- /.container-fluid -->
<?php include '../layouts/footer.php' ?>