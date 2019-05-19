<?php include '../autoload/autoload.php' ;
?>

<?php include '../layouts/header.php';
//var_dump($sv);
?>


<div id="content-wrapper">

  <div class="container-fluid"

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Trang chủ</a>
    </li>
  </ol>

  <?php include '../layouts/info.php';?>
  
  <!-- Area Chart Example-->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-chart-area"></i>
    Area Chart Example</div>
    <div class="card-body">
      <canvas id="myAreaChart" width="100%" height="30"></canvas>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>

  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
    Data Table Example</div>
    <div class="card-body">
      <div class="table-responsive">

      </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>

</div>
<!-- /.container-fluid -->
<?php include '../layouts/footer.php' ?>