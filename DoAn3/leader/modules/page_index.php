
<?php include '../autoload/autoload.php' ;
$id=$_SESSION["id_user"];
$sql="select *from team_pages where id_leader=$id";
$page=$db->fetchsql($sql);
$acc=$db->fetchAll("accounts");
$leader=$db->fetchAll("leaders");
$scc=$db->fetchAll("schools");
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
      <li class="breadcrumb-item active">Đội tình nguyện</li>
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
              <tbody>
                <?php foreach ($page as $item): ?>
                  <?php foreach ($acc as $item1): ?>
                    <?php foreach ($scc as $item2): ?>
                      <?php foreach ($leader as $item3): ?>
                        <?php foreach ($stt as $item4): ?>
                          <?php if(($item['id_leader']==$item3['id'])&&($item3['id_acc']==$item1['id'])): ?>
                          <?php if(($item['id_school']==$item2['id'])) :?>
                            <?php if(($item['state']==$item4['id'])): ?>
                              <tr>
                                <th width="200">ID</th>
                                <td><?php echo $item['id'] ?></td>
                              </tr>
                              <tr>
                                <th>Tên đội</th>
                                <td><?php echo $item['name'] ?></td>
                              </tr>
                              <tr>
                                <th>Lịch sử</th>
                                <td><?php echo mb_substr($item['history'],0,500) ?>...</td>
                              </tr>
                              <tr>
                                <th>Dòng trạng thái</th>
                                <td><?php echo mb_substr($item['status'],0,200) ?>...</td>
                              </tr>
                              <tr>
                                <th>Hình ảnh</th>
                                <td><?php echo $item['image'] ?></td>
                              </tr>
                              <tr>
                                <th>Thuộc</th>
                                <td><?php echo $item2['name'] ?></td>
                              </tr>
                              <tr>
                                <th>Đội trưởng</th>
                                <td><?php echo $item1['name'] ?></td>
                              </tr>
                              <tr>
                                <th>State</th>
                                <td><?php echo $item4['status'] ?></td>
                              </tr>
                              <tr>
                                <th>Link Mess</th>
                                <td><?php echo mb_substr($item['linkMess'],0,50)?>...</td>
                              </tr>
                              <tr>
                                <th>Link Fb</th>
                                <td><?php echo mb_substr($item['linkFb'],0,50)?>...</td>
                              </tr>
                              <tr>
                                <th>SDT</th>
                                <td><?php echo $item['SDT'] ?></td>
                              </tr>
                              <tr>
                                <th>Link Map</th>
                                <td><?php echo mb_substr($item['linkMap'],0,35)?>...</td>
                              </tr>
                              <tr>
                                <th>Action</th>
                                <td>
                                  <a class="btn btn-xs btn-info" href="page_update.php?id= <?php echo $item['id']  ?>"><i class="fas fa-plus"></i>Sửa</a>
                                  <a class="btn btn-xs btn-danger" href="page_delete.php?id= <?php echo $item['id']  ?>"><i class="fas fa-times"></i>Xóa</a>

                                </td>
                              </tr>

                            <?php endif ?>
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

</div>

<!-- /.container-fluid -->
<?php include '../layouts/footer.php' ?>