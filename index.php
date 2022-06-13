
<link rel="icon" href="./fav.png" type="image/png" size="50px">
<script src="./assets/js/ngomen.js"></script>

<?php
include "./inc/config-konek.php";
session_start();
$querypost = mysqli_query($db, "SELECT*FROM post ORDER BY id_post DESC");
$query1 = mysqli_query($db, "SELECT*FROM user ORDER BY tanggal_login_user DESC");
if (@$_SESSION["user"]) {
$dataliatkomen = mysqli_fetch_array(mysqli_query($db, "SELECT*FROM lihat WHERE user_lihat='$_SESSION[user]' AND apa_lihat='komentar'"));
    mysqli_query($db, "UPDATE user SET status_user='Online' WHERE user_user='$_SESSION[user]'");
    $query2 = mysqli_query($db, "SELECT*FROM user WHERE user_user='$_SESSION[user]'");
    $data2 = mysqli_fetch_array($query2);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Galeri Karya - Kreasi Muda BPMPK</title>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<style>
    a:focus{
        color:#2a6496;
    }
    .header-left {
    color: #fff;
    padding: 5px 5px 5px 20px;
    float: left;
    font-size: 16px;

}



.main{
        width: 150%;
        margin: auto;
        position: relative;}

        .nav{
        background-color: rgb(240,240,240);
        height: 38px;
        width: 100%;
        border-radius: 9px;}

        .list{
        position: relative;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, 'sans-serif';
        font-size: 105%;
        top: 24%;
        left: 13%;
    }
    .list li{
        display: inline ;
        margin: 0px 25px 30px 20px;
    }
    .list li:hover{
        background-color: rgb(133,203,192);
        border-radius: 3px;
        top: 20px;
        text-decoration: none;
        cursor: pointer;}

.alert-info {
  color: #000000;
  background-color: #c7ecee;
  border-color: #ffff;
}
.alert-info hr {
  border-top-color: #a6e1ec;
}
.alert-info .alert-link {
  color: #245269;
}

.navbar-side {
    border: none;
    background-color: #202020;
}

.navbar-cls-top {
    background: #2e86de;
    border-bottom: none;
}

.navbar-default .navbar-toggle:hover, .navbar-default .navbar-toggle:focus {
    background-color: #2e86de;
}
.active-menu {
    background-color: #2e86de!important;
}

.navbar-cls-top {
    background: #2e86de;
    border-bottom: none;
}

.navbar-default .navbar-toggle:hover, .navbar-default .navbar-toggle:focus {
    background-color: #2e86de;
}


#page-wrapper {
    padding: 15px 15px;
    min-height: 600px;
    background: #fff;
}
</style>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                 <a class="navbar-brand" href="./" style="font-size: 18epx; font-family: 'Lucida Sans Unicode','Trebuchet MS','Lucida Grande','Lucida Sans','Sans-Serif','Arial'; ">Kreasi Muda BPMPK</a>
            </div>
<div class="header-left">
    <a href="http://localhost/pictdates/"><img src="./header.png" width="225px"></a>
</div>
  
            <div class="header-right">
                <a href="./?p=user&user=<?php echo $data2["user_user"];?>#post" class="btn btn-warning" title="Postingan Anda">
                <b>
                    <?php
                    $querypostinganuser = mysqli_query($db, "SELECT*FROM post WHERE penulis_post='$_SESSION[user]'");
                    $cekpostinganuser = mysqli_num_rows($querypostinganuser);
                    echo $cekpostinganuser;
                    ?>
                </b>
                <i class="fa fa-pencil fa-2x"></i></a>
                <a href="./?p=komentar&post_user=<?php echo $data2["user_user"];?>" class="btn btn-primary" title="Notifikasi Komentar">
                <b>
                    <?php
                    $querykomentaruser = mysqli_query($db, "SELECT*FROM komentar WHERE penulis_post='$data2[user_user]' AND penulis_komentar!='$_SESSION[user]'");
                    
                    $cekkomentaruser = mysqli_num_rows($querykomentaruser);
                    
                 
                    ?>
                </b>
                <i class="fa fa-comment-o fa-2x"></i>
                <?php 
                if($dataliatkomen["lihat"] == 1){
                ?>
                <li class="badge" style="color:darkred;position:;">Baru</li>
                <?php
            }
            else{}
                ?>                
            </a>


                <a href="./?p=jempol&post_user=<?php echo $data2["user_user"];?>" class="btn btn-primary" title="Notifikasi Suka">
                <b>
                    <?php
                    $queryjempoluser = mysqli_query($db, "SELECT*FROM suka_post WHERE penulis_post='$data2[user_user]' AND user_suka!='$_SESSION[user]'");
                    $querylihatjempol = mysqli_query($db, "SELECT*FROM lihat WHERE user_lihat = '$_SESSION[user]' AND apa_lihat='like'");
                    $datajempoluser = mysqli_fetch_array($querylihatjempol);
                    $cekjempoluser = mysqli_num_rows($queryjempoluser);
                    
                    echo $cekjempoluser;
                    
                    ?>
                </b>    
                <i class="fa fa-thumbs-up fa-2x"></i> <?php 
                if($datajempoluser["lihat"] == 1){
                ?>
                <li class="badge" style="color:darkred;position:;">Baru</li>
                <?php
            }
            else{}
                ?> </a>


                <button onclick="window.location='./login/logout.php';" class="btn btn-danger" title="Keluar"><i class="fa fa-sign-out fa-2x"></i></button>

            </div>
        </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                   
                    <li>
                        <a title="Halaman Utama" class="active-menu" href="./"><i class="fa fa-home "></i>Beranda</a>
                    </li>
                    <li>
                        <a href="#" title="Tentang Saya"> <i class="fa fa fa-user "></i><?php echo $data2["nama_user"];?> <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                         <li>
                                <a title="Profil Saya" href="./?p=user&user=<?php echo $data2["user_user"];?>"><i class="fa fa-smile-o"></i>Profil</a>
                            </li>
                            <li>
                                <a title="Pengaturan Akun" href="./?p=edit&profil=<?php echo $data2["user_user"];?>"><i class="fa fa-gears"></i>Pengaturan</a>
                            </li>
                            <li>
                            <a href="./?p=posting&profil=<?php echo $data2["user_user"];?>"><i class="fa fa-pencil"></i>Buat Postingan</a>
                            </li>
                            <li>
                                <a href="./?p=galeriku&by=<?php echo $data2["user_user"];?>" title="Foto Dari Semua Postingan Saya"><i class="fa fa-photo"></i>Galeri Saya</a>
                            </li>
                           
                        </ul>
                    </li>
                    
                           
                        </ul>
                           
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <?php
            $user = @$_GET["user"];
            $p = @$_GET["p"];
            if ($user) {
                include 'inc/user.php';
            }
            elseif (empty($p)) {
                include 'inc/dashboard.php';
            }
            elseif ($p == 'beranda') {
                include 'inc/dashboard.php';
            }
            elseif ($p == 'galerikarya') {
                include 'inc/galerikarya.php';
            }
            elseif ($p == 'post') {
                include 'inc/read.php';
            }
            elseif ($p == 'daftar_pengguna') {
                include 'inc/member.php';
            }
            elseif ($p == 'edit') {
                include 'inc/edit-user.php';
            }
            elseif ($p == 'komentar') {
                include "inc/komentar-kamu.php";
            }
            elseif ($p == 'posting') {
                include 'inc/newpost.php';
            }
            elseif ($p == 'galeri') {
                include 'inc/galeri.php';
            }
            elseif ($p == 'jempol') {
                include 'inc/jempol.php';
            }
            elseif ($p == 'galeriku') {
                include 'inc/galeriku.php';
            }
            
            elseif ($p == 'diskusi') {
                include 'inc/diskusi.php';
            }
            else{
                echo "<script>window.location='./error';</script>";
            }
            ?>
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    <div id="footer-sec">
        &copy;Balai Pengembangan Multimedia Pendidikan dan Kebudayaan <span style="float:right;">Design By : <b>Pelajar SMK N 1 KANDEMAN</b>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php
}
else{
?>

 <!-- ================================================================================ -->


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<style>
    a:focus{
        color:#ffffff;
    }
nav {
 margin:left;
width: 20%;
} 

nav ul ul {
 display: none;
}

nav ul li:hover > ul{
display: block;
width: 134px;
}

nav ul {
 background: #2e86de;
 padding: 0 30px;
 list-style: none;
box-shadow: 0px 1px 5px;
 position: relative;
 margin: auto;
 display: inline-table;
 width: 1375px;
 height: 100px;

}

nav ul:after {
 content: ""; 
 clear:both; 
 display: block;
}

nav ul li{
 float:right;
 margin: 10px 10px 10px 0px;


}



nav ul li:hover a{
 color: #f1c40f;
}

nav ul li a{
    font-size: 17px;

    text-align: center;
 display: block;
 padding:30px;
 color: #fff;
 text-decoration:none;


}

nav ul ul{
 background: #0076d6;
 border-radius: 0px;
 padding: 0;
 position: absolute;
 margin: auto;
 top:100%;
}

nav ul ul li{
 float:none;
 border-top: 1px solid #0076d6;
 border-bottom: 1px solid #0076d6;
 position: relative;
}

nav ul ul li a{
 padding: 15px 40px;
 color: #fff;
}

nav ul ul li a:hover{
 background-color: #666;
}

nav ul ul ul{
 position: absolute;
 left: 0%;
 right: 0%;
 top: 0;
}

</style>
<body>
    
   
           



                    <div class="header-left">

                <nav>
                    <ul>
                       <a href="http://localhost/pictdates/"><img src="./header.png" width="275px" style="margin: 10px 10px 10px 20px;"></a>
                        <li><a href="login"><i class="fa fa-sign-in"> Login</i></a></li>
                           <li><a href="./pengelola"><i class="fa fa-users"> Pengelola</i></a></li>
                                <li><a href="./"><i class="fa fa-image"> Galeri</i></a></li>
                        <li><a href="http://localhost/pictdates/home/"><i class="fa fa-home"> Home</i></a></li>
                   
                 
                    </ul>
                </nav>
            </div> 
        
        </nav>



        <!-- /. NAV TOP  -->
       
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
       
            <?php
            $user = @$_GET["user"];
            $p = @$_GET["p"];
            if ($user) {
                include 'inc/user.php';
            }
            elseif (empty($p)) {
                include 'inc/dashboard.php';
            }
            elseif ($p == 'beranda') {
                include 'inc/dashboard.php';
            }
            elseif ($p == 'galerikarya') {
                include 'inc/galerikarya.php';
            }
            elseif ($p == 'post') {
                include 'inc/read.php';
            }
            elseif ($p == 'daftar_pengguna') {
                include 'inc/member.php';
            }
            elseif ($p == 'edit') {
                echo "<script>window.location='./error';</script>";
            }
            elseif ($p == 'galeri') {
                include 'inc/galeri.php';
            }
            elseif ($p == 'reg') {
                include 'assets/img/user/reg.php';
            }
            elseif ($p == 'galeriku') {
                include 'inc/galeriku.php';
            }
            else{
                echo "<script>window.location='./error';</script>";
            }
            ?>
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    <div id="footer-sec">
        &copy; 2018 Kreasi Muda BPMPK. All Right Reserved <span style="float:right;">SMKN 1 Kandeman
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php
}
?>