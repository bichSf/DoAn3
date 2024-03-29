<?php 
include '../autoload/autoload.php' ;
$sql1= "select * from team_pages where state=0";
$page2=$db->fetchsql( $sql1 );
$data2=[];
foreach ($page2 as $item2) {
    $data2[$item2['id']]=$item2;
}

$sql= "select * from schools where state=0";
$page=$db->fetchsql( $sql );
$data=[];
foreach ($page as $item) {
    $data[$item['id']]=$item;
}
?>

<?php include "layouts/header.php" ?>

<div class="col-3 col-lg-9 flex justify-content-end align-content-center">
    <nav class="site-navigation flex justify-content-end align-items-center">
        <ul class="flex flex-column flex-lg-row justify-content-lg-end align-content-center">
            <li><a href="index.php" style="color: black">Home</a></li>
            <li><a href="about.php" style="color: black">Giới thiệu</a></li>
            <li><a href="doiTN.php" style="color: black">Đội tình nguyện</a></li>
            <li class="dropdown current-menu-item"><a href="khoaVien.php">Khoa viện</a> </li>
            <li><a href="contact.php" style="color: black">Liên hệ</a></li>
        </ul>

    </div><!-- .header-bar-search -->
</nav><!-- .site-navigation -->
</div><!-- .col -->
</div><!-- .row -->
</div><!-- .container -->
</div><!-- .nav-bar -->
</header><!-- .site-header -->

<div class="page-header-overlay" style="background: url('images/bg-03.png')no-repeat center; background-size: cover; height: 500px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <header class="entry-header">
                    <h1 style="text-align: center;font-size: 60px;font-weight:bold ; color:#B70707"><br/><br/>KHOA VIỆN</h1>
                </header><!-- .entry-header -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .page-header-overlay -->
</div><!-- .page-header -->

<div class="container" >
    <div class="row">
        <div class="col-12">
            <div class="breadcrumbs">
                <ul class="flex flex-wrap align-items-center p-0 m-0">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li>Khoa viện</li>
                </ul>
            </div><!-- .breadcrumbs -->
        </div><!-- .col -->
    </div><!-- .row -->

    <div class="row">
        <div class="col-12 col-lg-7" style="margin-top: -60px">
            <div class="blog-posts">
                <div class="row mx-m-25">
                    <div class="row mx-m-25">
                        <?php foreach ($data2 as $item2): ?>
                            <div class="col-12 col-md-6 px-25">
                                <div class="course-content">
                                    <div class="course-content-wrap"  style="background: url('images/<?php echo $item2['image'] ?>');background-size: cover;"> 
                                        <header class="entry-header">
                                            <h2 class="entry-title">
                                                <a href="joinInPage.php?id=<?php echo $item2['id'] ?>" style="color: black">
                                                    <?php 
                                                    echo $item2['name'];
                                                    ?>
                                                </a>
                                            </h2>
                                            <br />  <br />
                                        </header><!-- .entry-header -->
                                    </div><!-- .course-content-wrap -->
                                </div><!-- .course-content -->
                            </div><!-- .col -->   
                        <?php  endforeach ?>
                    </div><!-- .col -->   
                </div><!-- .col -->
            </div>
        </div><!-- .col -->
        <div class="col-12 col-lg-1"></div>
 <div class="col-12 col-lg-4" style="margin-top: -100px;">
            <div class="sidebar">
                <div class="cat-links">
                    <h2><strong>Khoa viện</strong></h2>
                    <?php foreach ($data as $item): ?>
                        <ul class="p-0 m-0">
                            <li><a style="color: black" href="joinInVien.php?id=<?php echo $item['id'] ?>" ><?php echo $item['name'] ?></a></li>
                        </ul>
                    <?php endforeach  ?>

                </div><!-- .cat-links -->
            </div><!-- .sidebar -->
        </div><!-- .col -->
    </div><!-- .row -->
</div><!-- .container -->
</div>
</div>
</div>

</div>
<?php include "layouts/footer.php" ?>
