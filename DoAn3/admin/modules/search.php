
<?php 
include '../autoload/autoload.php' ;
if ($_SERVER["REQUEST_METHOD"]=="GET")
{
  $name=$_GET['timkiem'];
  $acc=$db->fetchAll("accounts");
  $leader=$db->fetchAll("leaders");
  $scc=$db->fetchAll("schools");
  $stt=$db->fetchAll("statuses");
  $level=$db->fetchAll("levels");

  $page=$db->search("team_pages",$name);
  $sccName=$db->search("schools",$name);
  $accName=$db->search("accounts",$name);
  $accEmail=$db->searchField("accounts",'email',$name);
  $accSDT=$db->searchField("accounts",'phone',$name);
  $accUN=$db->searchField("accounts",'user_name',$name);
  $accGT=$db->searchField("accounts",'gender',$name);
  $accHome=$db->searchField("accounts",'hometown',$name);
  $accLevel=$db->searchLevel("accounts","levels",'level',$name);
}
?>

<?php include "../layouts/header.php";?>
<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Trang chủ</a>
    </li>
    <li class="breadcrumb-item active">Tìm kiếm: <?php echo $name ?></li>
</ol>

<?php include '../layouts/info.php';?>

<?php if ($page!=null) : ?>
    <h3 class="text-success">Đội tình nguyện</h3>
    <div class="class row" style="margin-left: 20px">
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
                                <th>ID</th>
                                <td><?php echo $item['id'] ?></td>
                            </tr>
                            <tr>
                                <th>Tên đội</th>
                                <td><?php echo $item['name'] ?></td>
                            </tr>
                            <tr>
                                <th >Lịch sử</th>
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
                                <td><?php echo mb_substr($item['linkMess'],0,55)?>...</td>
                            </tr>
                            <tr>
                                <th>Link Fb</th> 
                                <td><?php echo mb_substr($item['linkFb'],0,55)?>...</td>
                            </tr>
                            <tr>
                                <th>SDT</th> 
                                <td><?php echo $item['SDT'] ?></td>
                            </tr>
                            <tr>
                                <th>Link Map</th> 
                                <td><?php echo mb_substr($item['linkMap'],0,55)?>...</td>
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
<?php endif ?>

<?php if ($page==null && $sccName==null && $accName==null &&$accEmail==null &&$accSDT==null &&$accUN==null &&$accGT==null &&$accHome==null &&$accLevel==null): ?>
    <p style="margin-left: 20px" class="text-success">Không có kết quả phù hợp</p>
<?php endif ?>

<?php if ($sccName!=null): ?>
    <h3 class="text-success">Khoa viện</h3>
    <div class="class row" style="margin-left: 20px">
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th scope="col" style="text-align: center">ID</th>
                  <th scope="col" style="text-align: center">Tên viện</th>
                  <th scope="col" style="text-align: center">Trạng thái</th>

              </tr>
          </thead>
          <tbody>
            <?php foreach ($scc as $item): ?>
              <?php foreach ($stt as $item1): ?>
                <?php if ($item['state']==$item1['id']): ?>

                  <tr>
                    <td><?php echo $item['id'] ?></td>
                    <td><?php echo $item['name'] ?></td>
                    <td><?php echo $item1['status'] ?></td>
                    <td>
                      <a class="btn btn-xs btn-info" href="schools_update.php?id= <?php echo $item['id']  ?>"><i class="fas fa-plus"></i>Sửa</a>
                      <a class="btn btn-xs btn-danger" href="schools_delete.php?id= <?php echo $item['id']  ?>"><i class="fas fa-times"></i>Xóa</a>

                  </td>
              </tr>
          <?php endif ?>
      <?php endforeach ?>
  <?php endforeach ?>

</tbody>
</table>
</div>  
</div>
</div>
<?php endif ?>

<?php if ($accName!=null || $accEmail!=null || $accSDT!=null || $accUN!=null || $accGT!=null || $accHome!=null ||$accLevel!=null):?>
    <?php  
    $str=[];
    if ($accName!=null) $str=$accName;
    if ($accEmail!=null) $str=$accEmail;
    if ($accSDT!=null) $str=$accSDT;
    if ($accUN!=null) $str=$accUN;
    if ($accGT!=null) $str=$accGT;
    if ($accHome!=null) $str=$accHome;
    if ($accLevel!=null) $str=$accLevel; ?>
    <h3 class="text-success">Tài khoản</h3>

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
            <?php foreach ( $str as $item): ?>
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
<?php endif ?>


</div>
<?php include '../layouts/footer.php' ?>
