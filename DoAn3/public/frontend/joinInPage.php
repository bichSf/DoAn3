
<?php 
include '../autoload/autoload.php' ;
$id=intval(getInput('id'));
$sql="select *from team_pages where id=$id";
$page=$db->fetchsql($sql);
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
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="doiTN.php">Đội tình nguyện</a></li>

                    <li><?php foreach ($page as $item) {
                        echo $item['name'];
                    }  ?>
                </li>
            </ul>
        </div><!-- .breadcrumbs -->
    </div><!-- .col -->
</div><!-- .row -->

<?php foreach ($page as $item): 
 ?>
 <h1 style="text-align: center"><?php echo $item['name']  ?></h1>
 <div class="row">
    <div class="col-12 col-lg-7">
        <div class="about-stories">
            <h3 style="color: #067C0E">Lịch sử</h3>
            <p style="color: black"><?php  echo $item['history']?></p>
        </div><!-- .about-stories -->
    </div><!-- .col -->

    <div class="col-12 col-lg-4" style="margin-left: 70px">
        <div class="about-values">
            <h3 style="color: #067C0E">Slogan:</h3>
            <p><br /><br /><br /></p>
            <p><?php  echo $item['status']?></p>
        </div><!-- .about-values -->
        <div class="col-12 col-lg-6 flex align-content-center mt-5 mt-lg-0">
            <img width="450px" height="450px" src="images/<?php  echo $item['image']?>">
        </div><!-- .row -->
    </div><!-- .col -->

    <div class="col-12 col-lg-6">
        <div class="map-info" style="color: black">
            <div><br><br><br></div>
            <div class="_4j7v">
                <img class="_a3f img" alt="" aria-label="Đính kèm bản đồ" src="<?php echo $item['linkMap']?>" width="650" height="200">
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4" style="margin-left: 190px;">
        <div class="contact-info" style="color: black ; font-size: 15pt">
            <span >LIÊN HỆ VỚI CHÚNG TÔI</span>
            <div><span class="_2iem">Quận Hai Bà Trưng- Hà Nội</span></div>

            <div>
                <a href="<?php echo $item['linkFb']?>" style="color: black" title="Đến trang facebook của đội"><i class="fa fa-facebook-square"></i> <?php echo $item['name'] ?></a>
            </div>
            <div>
                <a href="<?php echo $item['linkMess']?>" style="color: black" title="Nhắn tin qua messenger cho đội"><i class="fa fa-commenting-o"></i> m.me/clbmaubachkhoa</a>
            </div>
            <?php if ($item['SDT']!=0) {?>
                <div><i class="fa fa-phone"></i> Gọi 0<?php echo $item['SDT']?></div>
            <?php } ?>
        </div>
    </div>
</div>
<?php endforeach ?>
</div>
<div><br></div>
<?php include "layouts/footer.php" ?>
