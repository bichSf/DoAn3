<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  
  <link rel="icon" type="image/png" href="<?php echo base_url() ?>public/frontend/images/icons/favicon.ico"/>

  <title>Admin - SVTN HUST</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url() ?><?php echo base_url() ?>public/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url() ?>public/admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url() ?>public/admin/css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="../modules/index.php">SVTN HUST</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item ">
          <a class="nav-link" href="../modules/index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Trang chủ</span>
          </a>
        </li>

        <li class="nav-item dropdown " >
          <a class="nav-link dropdown-toggle " href="acc_index.php" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span>Tài khoản</span>
          </a>
        </li>


        <li class="nav-item dropdown " >
          <a class="nav-link dropdown-toggle" href="leader_index.php" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span>Đội trưởng</span>
          </a>
        </li>

        <li class="nav-item dropdown " >
          <a class="nav-link dropdown-toggle" href="schools_index.php" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span>Khoa viện</span>
          </a>
        </li>

         <li class="nav-item dropdown " >
          <a class="nav-link dropdown-toggle" href="page_index.php" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span>Đội tình nguyện</span>
          </a>
        </li>

        
        <li class="nav-item dropdown " >
          <a class="nav-link dropdown-toggle" href="levels_index.php" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span>Chức vụ</span>
          </a>
        </li>


        <li class="nav-item dropdown" >
          <a class="nav-link dropdown-toggle" href="status_index.php" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span>Trạng thái</span>
          </a>
        </li>
      </ul>
    </nav>
