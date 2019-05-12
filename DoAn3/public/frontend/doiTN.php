
<?php 
include '../autoload/autoload.php' ;
$page=$db->fetchAll('team_pages');
?>
<?php include "layouts/header.php";?>
<div class="col-3 col-lg-9 flex justify-content-end align-content-center">
    <nav class="site-navigation flex justify-content-end align-items-center">
        <ul class="flex flex-column flex-lg-row justify-content-lg-end align-content-center">
            <li><a href="index.php" style="color: black">Home</a></li>
            <li><a href="about.php" style="color: black">Giới thiệu</a></li>
            <li class="current-menu-item"><a href="doiTN.php">Đội tình nguyện</a></li>
            <li><a href="khoaVien.php" style="color: black">Khoa viện</a></li>
            <li><a href="contact.php" style="color: black">Liên hệ</a></li>
        </ul>

    </div><!-- .header-bar-search -->
</nav><!-- .site-navigation -->
</div><!-- .col -->
</div><!-- .row -->
</div><!-- .container -->
</div><!-- .nav-bar -->
</header><!-- .site-header -->

<div class="page-header-overlay" style="background: url('images/bg5.jpg')no-repeat center; background-size: cover; height: 500px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <header class="entry-header">
                    <h1 style="text-align: center;font-size: 60px;font-weight:bold ; color:#B70707"><br/><br/>ĐỘI SVTN HUST</h1>
                </header><!-- .entry-header -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .page-header-overlay -->
</div><!-- .page-header -->

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumbs">
                <ul class="flex flex-wrap align-items-center p-0 m-0">
                    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                    <li>Đội tình nguyện</li>
                </ul>
            </div><!-- .breadcrumbs -->
        </div><!-- .col -->
    </div><!-- .row -->

    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="featured-courses courses-wrap">
                <div class="row mx-m-25">
                    <?php foreach ($page as $item): ?>
                      <div class="col-12 col-md-4 px-25">
                        <div class="course-content">

                            <div class="course-content-wrap"  style="background: url('images/<?php echo $item['image'] ?>');background-size: cover;"> 
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="joinInPage.php" style="color: black"><?php echo $item['name'] ?></a></h2>
                                    <br />  <br />
                                </header><!-- .entry-header -->
                            </div><!-- .course-content-wrap -->
                            
                        </div><!-- .course-content -->
                    </div><!-- .col -->   
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
</div>
<div><br></div>
<?php include "layouts/footer.php" ?>
