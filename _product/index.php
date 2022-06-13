<?php
if (@$_SESSION["user"]) {
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BOS |OR</title>

    <!-- Bootstrap Core CSS -->
    <link href="res/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="hehe.css">
    <link rel="stylesheet" href="1.css">

    <!-- Custom Fonts -->
    <link href="res/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="res/css/agency.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="res/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="res/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="res/js/jqBootstrapValidation.js"></script>
    <script src="res/js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="res/js/agency.min.js"></script>

</head>

<body id="page-top" class="index">

     <form method="post" action="">
                            <input type="text" name="katapengumuman" style="width:100%;"> <input type="submit" hidden name="pengumuman">
                        </form>
                        <form method="post" action="">
                            <input type="submit" class="btn btn-primary" name="bkdaftar" value="Buka Registrasi"> | <input type="submit" class="btn btn-warning" name="tpdaftar" value="Tutup Registrasi">
                        </form>
                        <?php
                        }
                        else{
                            echo "<div class='alert alert-warning'>!: <b style='color:darkred;'>$datapengumuman[pengumuman_tegar]</b></div>";
                        }
                        ?>
                    </div>
                </div>
<?php
                    if (@$_POST["komenin"]) {
                    $komentarbla = mysqli_real_escape_string($db, $_POST["ngomen"]);
                    date_default_timezone_set("Asia/Jakarta");
                    $tglkmn = date("G:i d/m/Y");
                    $berhasil = mysqli_query($db, "INSERT INTO komentar VALUES ('','$_SESSION[user]','$komentarbla','$tglkmn','$datasqlpost[id_post]','$data2[pp_user]','$datasqlpost[penulis_post]','1')");
                    if ($berhasil) {
                        # code...
                    echo "<script>window.location='./?p=beranda#post$datasqlpost[id_post]';</script>";
                    echo "<script>autoload();</script>";
                    }
                    }
                    ?>
                <?php

                $sqlpost = mysqli_query($db, "SELECT*FROM post ORDER BY id_post DESC");
                while ($datasqlpost = mysqli_fetch_array($sqlpost)) {
                    $datauserpost = mysqli_fetch_array(mysqli_query($db, "SELECT*FROM user WHERE user_user='$datasqlpost[penulis_post]'"));
                ?>

    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 style="color:red;"><font face="Captain Howdy">Produk Kami</font></h1>
                    <h5 style="color:#f4ad42">Batang Computer Area Menyediakan Perangkat Komputer serta Perangkat Pendukung Lainnya.</h5>
                    <br/>
                    <br/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-shopping-cart fa-3x"></i>
                                <h3>Rp 8.199.000</h3>
                            </div>
                        </div>
                        <img style="border:8px ridge #ff1919 " src="img/portfolio/pchp2.jpg" width="400" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>HP 20c036l</h4>
                    
                        <p class="text-muted"><a href="#portfolioModal1" class="portfolio-link" data-toggle="modal" title="Lihat Lebih Lengkap">Detail</a></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-shopping-cart fa-3x"></i>
                                <h3>Rp 894.000</h3>
                            </div>
                        </div>
                        <img style="border:8px ridge #ff1919 " src="img/portfolio/printerhp.jpg" width="400" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>HP ENVY 5030 Wireless</h4>
                        <p class="text-muted"><a href="#portfolioModal2" class="portfolio-link" data-toggle="modal" title="Lihat Lebih Lengkap">Detail</a></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-shopping-cart fa-3x"></i>
                                <h3>Rp 11.385.000</h3>
                            </div>
                        </div>
                        <img style="border:8px ridge #ff1919"  src="img/portfolio/laptophp.jpg" width="400" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>HP 250 G6 1WY46E</h4>
                        <p class="text-muted"><a href="#portfolioModal3" class="portfolio-link" data-toggle="modal" title="Lihat Lebih Lengkap">Detail</a></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-shopping-cart fa-3x"></i>
                                <h3>Rp 140.000</h3>
                            </div>
                        </div>
                        <img style="border:8px ridge #ff1919" src="img/portfolio/tintaepson.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Tinta Printer EPSON T6731-BLK</h4>
                        <p class="text-muted"><a href="#portfolioModal5" class="portfolio-link" data-toggle="modal" title="Lihat Lebih Lengkap">Detail</a></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal5" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-shopping-cart fa-3x"></i>
                                <h3>Rp 15.299.000</h3>
                            </div>
                        </div>
                        <img style="border:8px ridge #ff1919" src="img/portfolio/laptoplenovo.jpg"  class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>LENOVO Ideapad IP710s</h4>
                        <p class="text-muted"><a href="#portfolioModal5" class="portfolio-link" data-toggle="modal" title="Lihat Lebih Lengkap">Detail</a></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal6" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-shopping-cart fa-3x"></i>
                                <h3>Rp 1.100.000</h3>
                            </div>
                        </div>
                        <img style="border:8px ridge #ff1919"  src="img/portfolio/mouseasus.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Mouse Gaming ASUS ROG Pugio</h4>
                        <p class="text-muted"><a href="#portfolioModal6" width="100px" class="portfolio-link" data-toggle="modal" title="Lihat Lebih Lengkap">Detail</a></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal7" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-shopping-cart fa-3x"></i>
                                <h3>Rp 250.000</h3>
                            </div>
                        </div>
                        <img style="border:8px ridge #ff1919"  src="img/portfolio/cartridge.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>HP 680 Black Original Ink Advantage Cartridge</h4>
                        <p class="text-muted"><a href="#portfolioModal7" width="100px" class="portfolio-link" data-toggle="modal" title="Lihat Lebih Lengkap">Detail</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>


   
    <!-- Portfolio Modals -->
    <!-- Use the modals below to showcase details about your portfolio projects! -->

   <!-- Portfolio Modal 1 -->
   <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" onClick="document.location.reload(true)">
                    <div class="lr">
                <div class="rl">
                </div>
                 </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2><font face="impact">Personal Computer <br/> All in One HP 20c036l </font></h2>
                                <p class="item-intro text-muted"><b>Tahun Rilis : 2016 | OS : Windows 10</b></p>
                                <p><button style="color:red;background-color:yellow;border:4px;font-size:20px;text-align:center"><i class="fa fa-tag"> Rp 8.199.000</i></button></p>

                                <img style="border:8px ridge #0404B4;"  class="img-responsive img-centered" src="img/portfolio/pchp2.jpg" width="600" height="600" alt="Lamurdey logo"  alt="">
                                <p><button style="color:red;background-color:#ff7a14;border:4px;font-size:20px;text-align:center"><i class="fa fa-shopping-cart">  Produk Terjual : 17 </i></button></p>

                                <h3>Spesifikasi Produk</h3>
                                <p> 
                                <b>Prosesor</b> : Intel® Core™ i5-6200U (6M Cache, up to 2.80 GHz) <br/>
                                <b>Sistem Operasi</b> : DOS <br/>
                                <b>Display</b> : 19.45″inch 16:9 1600×900 WLED <br/>
                                <b>Memory</b> :4GB DDR3 (1x4GB) <br/>
                                <b>Chipset</b> : Intel H81 <br/>
                                <b>Graphis</b> : Down Integrated In Chipset <br/>
                                <b>Hard Drive</b> : 1TB 7200RPM <br/>
                                <b>Optical Drive</b> : Ultra Slim Fixed SuperMulti DVDRW ODD <br/>
                                <b>WLAN</b> : WLAN bgn 1×1 BT M.2 NIC <br/>
                                <b>Mouse & Keyboard</b> : HP WIRED Keyboard & Mouse <br/>
                                <b>Media Card</b> : HP 3-in-1  <br/>
                                <h2>Detail Produk HP 20-C036L AIO PC</h2> <br/>
                                </p> <br/>
                            
                                <p><b>HP 20-c036L</b><br/> adalah Desktop PC All in One yang dapat memberikan banyak manfaat untuk kegiatan Anda sehari-hari. Dengan desain modern membuat Desktop ini cocok ditempatkan di mana pun dan membuat suasana ruangan Anda terasa lebih mengesankan. Selain itu, kapasitas Storage yang besar sebagai tempat penyimpanan, kini Anda telah menemukan Desktop PC yang ideal untuk kegiatan komputasi, hiburan dan Gaming Anda.</p>
                               <p><b>HP All-in-One PC 20-C036L</b> <br/>merupakan All-in-One PC yang menawarkan performa tinggi dan desain yang hemat ruang. HP 20-C036L akan menjadi solusi terbaik Anda untuk bekerja dan menikmati hiburan bersama keluarga. Memiliki layar berjenis WLED-backlit yang akan menampilkan gambar yang jernih. Selain layar yang menawan, HP 20-C036L juga dipersenjatai dengan hardware yang bertenaga. All-in-One PC ini pun sangat pas untuk menemani Anda tidak hanya untuk sekadar bekerja namun juga untuk mencari hiburan seperti berselancar di internet, mendengarkan musik, atau bermain game.<br/>
 
 
 

 
 
 
<b>Layar Lebar 20 Inci</b><br/>
 
<b>HP 20-C036L</b> ini mengusung konsep perangkat yang ringkas dan tidak memakan tempat. Tidak hanya mudah ditata sesuai interior ruangan, HP 20-C036L juga hadir dalam balutan desain yang elegan untuk memberikan aura modern di ruang keluarga atau meja kerja. Memiliki bodi super ramping dengan layar 20 inci berjenis FHD WLED-backlight dengan layar diagonalnya yang lebar. Dengan layar canggih ini akan menjamin gambar jernih dan mengurangi konsumsi daya, serta dapat mengurangi pantulan cahaya di layar. <br/>
 
 
 

 
 
<b>Performa Handal untuk Berbagai Kebutuhan</b><br/>
 
<b>HP 20-C036L</b> dipersenjatai dengan hardware yang bertenaga. HP menyematkan prosesor Intel Core i5-6200U dan dipacu dengan kartu grafis  Integrated Intel HD Graphics. Selain itu, HP menyediakan RAM 4 GB serta ruang penyimpanan hingga 1 TB. Kombinasi hardware tersebut tidak hanya menghasilkan performa kencang untuk pekerjaan yang membutuhkan komputasi tinggi seperti mengedit foto atau video, tetapi juga untuk hiburan termasuk menjalankan game-game terbaru. <br/>
 
 
 

 
 
 
 
 
<b>Konektivitas yang Beragam</b><br/>
 
HP 20-C036L mempunyai konektivitas yang lengkap. Anda akan mendapatkan dukungan WiFi B/G/N dan dukungan bluetooth M.2. Tak hanya itu, port yang dimilikinya antara lain Lock slot, Disk activity LED, USB 2.0: 2, LAN (Ethernet), Power LED, DC power in, USB 3.0: 2, HDMI, dan Headphone/Microphone. Tak ketinggalan, HP membekali sebuah webcam pada All-in-One PC ini. Dengan fitur webcam ini, Anda dapat sekedar mengabadikan momen ataupun berkomunikasi jarak jauh secara mudah dengan kerabat Anda.

</p>
 
    </div>
    <br/>
    <br/>                        
                    <button style="background-color: red;color:yellow ;font-style:bold;text-align:center"><a href="#portfolioModal2" class="portfolio-link" data-toggle="modal" >Produk Selanjutnya</a><i class="fa fa-arrow-right"></i></button> <br/><br/>
                        <button type="button" class="btn btn-primary" onClick="document.location.reload(true)"><i class="fa fa-times"></i> Close Project</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 2 -->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" onClick="document.location.reload(true)">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2 <font face="impact" >Printer HP ENVY 5030 Wireless</font></h2>
                                <p class="item-intro text-muted">Rilis : Juli 2017</p>
                                <p><button style="color:red;background-color:yellow;border:4px;font-size:20px;text-align:center"><i class="fa fa-tag"> RP 894.000</i></button></p>
                                <img style="border:8px ridge #0404B4;" class="img-responsive img-centered" src="img/portfolio/printerhp.jpg" alt="">
                                <p><button style="color:red;background-color:#ff7a14;border:4px;font-size:20px;text-align:center"><i class="fa fa-shopping-cart">  Produk Terjual : 59 </i></button></p>
                                <p><a href="http://designmodo.com/startup/?u=787">Startup Framework</a> is a website builder for professionals. Startup Framework contains components and complex blocks (PSD+HTML Bootstrap themes and templates) which can easily be integrated into almost any design. All of these components are made in the same style, and can easily be integrated into projects, allowing you to create hundreds of solutions for your future projects.</p>
                                <p>You can preview Startup Framework <a href="http://designmodo.com/startup/?u=787">here</a>.</p>
                                <button style="background-color: red;color:yellow ;font-style:bold;text-align:center"><a href="#portfolioModal3" class="portfolio-link" data-toggle="modal" >Produk Selanjutnya</a></button> <br/><br/>
                                <button type="button" class="btn btn-primary" onClick="document.location.reload(true)"><i class="fa fa-times"></i> Close Project</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 3 -->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" onClick="document.location.reload(true)">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2 <font face="impact" >Laptop HP 250 G6 1WY46E</font></h2>
                                <p class="item-intro text-muted">Rilis : Februari 2017</p>
                                <p><button style="color:red;background-color:yellow;border:4px;font-size:20px;text-align:center"><i class="fa fa-tag"> Rp 11.385.000</i></button></p>
                                <img style="border:8px ridge #0404B4;" class="img-responsive img-centered" src="img/portfolio/laptophp.jpg" alt="">
                                <p><button style="color:red;background-color:#ff7a14;border:4px;font-size:20px;text-align:center"><i class="fa fa-shopping-cart">  Produk Terjual : 4 </i></button></p>
                                <h3>Spesifikasi Produk</h3>
                                <p>Kategori : Laptop <br/>Berat : 6.0 Kilogram <br/>Merek : HP <br/> Screen Size : 14-15 inc <br/>RAM : 8 GB <br/> HDD : 1 TB </p>
                                <h2>Deskripsi Produk</h2>
                                <p>     
Desain seluler yang tahan lama
Didukung untuk bisnis
Proyek yang benar-benar lengkap dengan Windows 10 Pro1 dan kekuatan Intel Core i3 / i5 / i7 generasi ke-7 terbaru, prosesor2 dengan DDR4 Memory3 opsional.

Ekstra yang memoles pengalaman
HP, pemimpin dunia dalam PC membantu melengkapi Anda dengan notebook yang berfungsi penuh yang siap untuk terhubung ke semua peripheral3 Anda dan dirancang agar sesuai dengan kebutuhan bisnis dengan port RJ-45 dan port VGA.

Spesifikasi  Lengkap
HP 250 G6 ( OS ) HPNB3WT00PA
Intel Core i7 7500U 2,7 GHz up to 3,5 GHz
Memory 8 GB DDR4 2133 2 Slot up to 16 GB , 
1 TB HDD , 
15" HD SVA Anti Glare slim LED baclit, 
Integrated 720p HD webcam , 
Intel Dual Band Wireless-AC 3165 802.11a/b/g/n/ac (1x1) 
Bluetooth , SD / MMC , Gigabit LAN , 1 VGA 1 HDMI , TPM 1.2 ,
WiFi and Bluetooth 4.2 Combo with Wi-Di, 4 Cell 41 WHr , DVDRW
Warranty 1/1/0 , WINDOWS 10 PRO , BAG </p>

                                
                                 <button style="background-color: red;color:yellow ;font-style:bold;text-align:center;position:center"><a href="#portfolioModal4" class="portfolio-link" data-toggle="modal" >Produk Selanjutnya</a></button> <br/><br/>
                                <button type="button" class="btn btn-primary" onClick="document.location.reload(true)"><i class="fa fa-times"></i> Close Project</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 4 -->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" onClick="document.location.reload(true)">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2 <font face="impact" >Tinta Printer EPSON T6731-BLK</font></h2>
                                <p class="item-intro text-muted">Rilis : November 2017</p>
                                <p><button style="color:red;background-color:yellow;border:4px;font-size:20px;text-align:center"><i class="fa fa-tag"> Rp 140.000</i></button></p>
                                <img style="border:8px ridge #0404B4;" class="img-responsive img-centered" src="img/portfolio/tintaepson.jpg" alt="">
                                <p><button style="color:red;background-color:#ff7a14;border:4px;font-size:20px;text-align:center"><i class="fa fa-shopping-cart">  Produk Terjual : 28 </i></button></p>
                               <h3>Spesifikasi Produk </h3>
                               <p>Spesifikasi Tinta Epson 673 :<br/>

•    Tinta Epson Original <br/>
•    Kapasitas 70 ml<br/>
•    Warna Black / Hitam<br/>
•    Superior Quality<br/>
•    Hemat tinta dengan kualitas hasil cetak yang sangat tajam<br/>
•    Sangat aman tidak merusak printer </p>
                                <h2>Deskripsi Produk</h2>
                    <p>Epson Tinta T6731 adalah tinta hitam yang dpakai untuk printer inktank epson.Tinta original epson ini tahan noda dan tidak mudah pudar dan tahan lama. Untuk mendapatkan hasil cetak yang bagus gunakan selalu tinta epson original ini. Tinta Epson ini digunakan untuk mencetak dokumen dan gambar dengan kualitas yang bagus.<br/>

<b>Performa</b><br/>

Mencetak dokumen maupun gambar dengan kualitas yang bagus dan terjamin. Tinta Epson T6731 hitam original ini dirancang tidak merusak head printer dan untuk pengisian tinta sangat mudah dan fleksibel. Dengan tinta epson yang original biaya cetak dokumen relatif lebih murah. Untuk tinta ini hasil warnanya lebih bagus karena printer tipe ini sudah memakai 6 tinta printer.<br/>


<b>Kompatibilitas</b><br/>

Tinta Epson T6731 hitam ini dapat digunakan untuk printer Epson Inktank L800,L850 dan L1800 - Serie 6 tinta<br/></p>
<hr/>
<h3><b>Hal yang perlu diperhatikan :</b></h3>

<p> Jangan dicampur dengan tipe tinta epson yang berbeda <br/>
    Jauhkan dari jangkauan anak-anak<br/>
    Buka kemasan botol tinta jika sudah siap digunakan<br/>
    Hati-hati jangan sampai tinta masuk ke mata atau mulut anda.<br/> Dalam kasus kontak mata atau tertelan, bilas dengan air dan hubungi dokter<br/>
    Simpan secara berdiri dan pastikan tutup botol tertutup rapat. <br/>jika tidak, tinta dapat bocor atau tumpah jika botol terjatuh<br/>
    Untuk lebih jelasnya, silahkan lihat manual printer anda </p> <br/>
 <button style="background-color: red;color:yellow ;font-style:bold;text-align:center;position:center"><a href="#portfolioModal5" class="portfolio-link" data-toggle="modal" >Produk Selanjutnya</a></button> <br/><br/>
                                <button type="button" class="btn btn-primary" onClick="document.location.reload(true)"><i class="fa fa-times"></i> Close Project</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 5 -->
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" onClick="document.location.reload(true)">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2 <font face="impact">Laptop LENOVO Ideapad IP710s</font></h2>
                                <p class="item-intro text-muted">Rilis : Desember 2017</p>
                                <p><button style="color:red;background-color:yellow;border:4px;font-size:20px;text-align:center"><i class="fa fa-tag"> Rp 15.299.000</i></button></p>
                                <img style="border:8px ridge #0404B4;" class="img-responsive img-centered" src="img/portfolio/laptoplenovo.jpg" alt="">
                                <p><button style="color:red;background-color:#ff7a14;border:4px;font-size:20px;text-align:center"><i class="fa fa-shopping-cart">  Produk Terjual : 10 </i></button></p>
                                <h3>Spesifikasi Produk : </h3>
                                <p><b>Processor
Hingga Intel Generasi Keenam® Core™ i7</b><br/>
<b>Sistem Operasi</b> : Windows 10 Home<br/>
<b> grafis : Intel® </b><br/>
<b>Kartu grafis Onboard atau kartu grafis diskrit</b> :  NVIDIA® GeForce® 940MX<br/>
Kartu grafis diskrit
<b>Webcam / Mikrofon</b> : 720p dengan Mikrofon Tunggal<br/>
<b>Memori</b> : DDR4 hingga 8 GB <br/>
<b>Media Penyimpanan</b> : PCIe SSD hingga 512 GB<br/>
<b>Audio></b> : 2 x Speaker Stereo® Bersertifikasi JBL Dolby Audio™ Premium<br/>
<b>Baterai</b> : Hingga 7 jam<br/>
<b>Layar</b> : 13.3" resolusi hingga QHD+ (3200 x 1800) IPS, 300 nits<br/>
<b>Dimensi (P x L x T) </b><br/>
(mm) : 309 x 220 x 14.8<br/>
(inci) : 12.16" x 8.66" x 0.58"<br/>
Berat : Mulai dari 2.6 lbs (1.18 kg)<br/>
<b>Warna </b><br/>  
Platinum Silver
Champagne Gold
<b>WLAN</b>  <br/>  
WiFi 802.11 ac<br/>
Bluetooth®  <br/>
Bluetooth® 4.1<br/>
<b>Port</b> <br/>   
1 x USB-C (DisplayPort™)<br/>
1 x USB 3.0 (always-on charging)<br/>
1 x USB 2.0<br/>
Audio Combo Jack
4-in-1 Card Reader (SD, SDHC, SDXC, MMC)<br/>
<br/>
                                <h2>Deskripsi Produk</h2>
                                <p>Laptop dengan performa yang cukup bisa diandalkan terkadang memang dibutuhkan oleh sebagian orang, khususnya bagi mereka yang diharuskan bisa melakukan komputasi dengan cepat. Nah, Lenovo menjawab kebutuhan tersebut dengan menghadirkan salah satu laptop andalannya, Lenovo Ideapad 710S.<br/>
Lenovo Ideapad 710S memang tidak dibekali dengan spesifikasi yang paling bagus. Meskipun begitu, kinerja laptop ini udah cukup cepat, sehingga bisa diandalkan untuk menjalankan komputasi yang sifatnya cukup berat sekalipun. Selain itu, dimensi laptop ini juga tidak terlalu besar, cocok buat kamu yang tingkat mobilitasnya tinggi.

<b>Desain Lenovo Ideapad 710S</b><br/>

Laptop ini hadir dengan dimensi yang cukup kompak. Layarnya berukuran 13.3 inch dengan tingkat resolusi full HD 1920 x 1080 pixels. Berkat dimensi layar yang tidak terlalu besar, bodi laptop ini tentu juga tidaklah besar, dan hal itu membuatnya mudah untuk dibawa bepergian.
<br/>

<b>Performa Lenovo Ideapad 710S</b><br/>
Jeroan laptop ini dihuni oleh prosesor Intel Core i5 7200U-2.5Ghz Turbo 3.1Ghz.Selain itu terdapat juga RAM 8 GB DDR4. Untuk kebutuhan grafis, Lenovo menyematkan VGA Intel HD Graphics 620 dan nVidia GeForce GT940MX 2GB DDR5. Sedangkan untuk mengakomodasi berbagai jenis file yang ingin disimpan disediakan SSD berkapasitas 256 GB.
<br/>

<b>Konektivitas Lenovo Ideapad 710S </b><br/>
Lenovo melengkapi laptop besutannya ini dengan beberapa buah port, seperti USB 3.0, USB 2.0, USB 3.1 type-C, Audio combo, HDMI out, RJ-45, dan 4-in-1 card reader. <br/>

 <button style="background-color: red;color:yellow ;font-style:bold;text-align:center;position:center"><a href="#portfolioModal6" class="portfolio-link" data-toggle="modal" >Produk Selanjutnya</a></button> <br/><br/>
                                <button type="button" class="btn btn-primary" onClick="document.location.reload(true)"><i class="fa fa-times"></i> Close Project</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 6 -->
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" onClick="document.location.reload(true)">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2 <font face="impact" >Mouse Gaming ASUS ROG Pugio</font></h2>
                                <p class="item-intro text-muted">Rilis : Agustus 2017</p>
                                <p><button style="color:red;background-color:yellow;border:4px;font-size:20px;text-align:center"><i class="fa fa-tag"> Rp 1.100.000</i></button></p>
                                <img style="border:8px ridge #0404B4;" class="img-responsive img-centered" src="img/portfolio/mouseasus.jpg" alt="">
                                <p><button style="color:red;background-color:#ff7a14;border:4px;font-size:20px;text-align:center"><i class="fa fa-shopping-cart">  Produk Terjual : 73 </i></button></p>
                                <p><h3><b>Sepsifikasi Produk</b></h3> <br/>
                                <b>Gaming mouse</b><br/>
                                <b>Resolution</b> : 7200 DPI <br/>
                                Configurable magnetic side buttons for a truly ambidextrous and ergonomic gaming mouse <br/>
                                <b>Garansi</b><br/>
                                1 Year (Local Official Distributor Warranty)</br>
                                - ASUS Aura Sync Pencahayaan RGB di tiga zona berbeda menampilkan spektrum warna yang hampir tak terbatas dengan kemampuan untuk menyinkronkan berbagai efek di seluruh ekosistem yang terus berkembang dari produk-produk Aura Sync yang diaktifkan<br/>
                                -Sensor optik gaming-grade dengan 7200 DPI, 150 IPS dan 30g percepatan untuk pelacakan cepat dan akurat<br/>
                                - Desain soket push-fit eksklusif untuk dengan mudah menukar switch Omron 50 juta klik yang tahan lama<br/>
                                - Antarmuka perangkat lunak ROG Armour yang intuitif untuk penyesuaian tombol, kinerja dan pengaturan pencahayaan yang mudah.<br/> </p><br/>

                                <h2><b>Deskripsi Produk</b></h2>
                                <p><b> Mouse Tangan Kanan dan Kiri</b> <br/>
Asus menghadirkan sebuah mouse gaming yang dapat digunakan untuk Anda yang biasa menggunakan mouse tangan kiri dengan nama ROG Pugio, namun walaupun begitu mouse gaming ini dapat digunakan bagi Anda yang biasa menggunakan mouse tangan kanan. Mouse gaming hebat besutan Asus ini menawarkan fitur-fitur yang mampu mengkostumisasi demi bertemu dengan kebutuhan para gamers. Mouse gaming ini menghadirkan fitur-fitur hebat tanpa harus mengorbankan estetika. 
<br/>



<b>Layout Tombol Di kedua Sisi</b><br/>
Mouse gaming Asus ROG Pugio adalah mouse yang bisa digunakan kedua tangan, oleh karena itu hadir dengan layout tombol yang sama diantara sisinya untuk mengakomodasi pengguna dengan tangan kanan atau kiri. Karena gaming mouse ini hadir dengan tombol magnetik yang bisa dikonfirasi. Anda bisa melepas tombol dan mengganti ke kedua sisi, sehingga Anda tidak perlu repot-repot mengganti posisi.
<br/>



<b>Mouse Anda Akan Panjang Umur</b><br/>
ROG Pugia hadir dengan sebuah desain soket switch push-fit eksklusif yang memudahkan Anda untuk mengganti switchnya untuk pantulan klik. Penggantian switch pun bisa dilakukan supaya umur mouse Anda bisa lebih panjang. Mouse gaming ini tentunya menjadi pilihan Anda yang gemar bermain game, dapatkan segera di BCA. <br/> </p>
                               <br/>
                                 <button style="background-color: red;color:yellow ;font-style:bold;text-align:center;position:center"><a href="#portfolioModal7" class="portfolio-link" data-toggle="modal" >Produk Selanjutnya</a></button> <br/><br/>
                                <button type="button" class="btn btn-primary" onClick="document.location.reload(true)"><i class="fa fa-times"></i> Close Project</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 7 -->
   <div class="portfolio-modal modal fade" id="portfolioModal7" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" onClick="document.location.reload(true)">
                    <div class="lr">
                <div class="rl">
                </div>
                 </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2 <font face="impact" >HP 680 Black Original Ink Advantage Cartridge </font></h2>
                                <p class="item-intro text-muted"><b>Rilis : Januari 2016</b></p>
                                <p><button style="color:red;background-color:yellow;border:4px;font-size:20px;text-align:center"><i class="fa fa-tag"> Rp 250.000</i></button></p>
                                <img style="border:8px ridge #0404B4;"  class="img-responsive img-centered" src="img/portfolio/cartridge.png" width="600" height="600" alt="Lamurdey logo"  alt="">
                                <p><button style="color:red;background-color:#ff7a14;border:4px;font-size:20px;text-align:center"><i class="fa fa-shopping-cart">  Produk Terjual : 15 </i></button></p>
                                <h3>Spesifikasi Produk</h3>
                                <p> 
                                <b>Kategori</b> : Cartridge<br/>
                                <b>Berat</b> : 180 gram<br/>
                                <b>Merek</b> : HP<br/>
                                <b>Tipe</b> : Ink-jet<br/>

                                <h2>Deskripsi Produk </h2>
                                <p> 
            <b>HP 680 Black Original Ink Advantage Cartridge</b> <br/>

            <b>Compatible Printer</b> :
        HP DeskJet Ink Advantage 1115 Printer (F5S21B), 2135 All-in-One Printer (F5S29B), 3635 All-in-One Printer (F5S44B), 3835 All-in-One Printer (F5R96B), 4535 All-in-One Printer, 5075 All-in-One Printer, 4535 All-in-One Printer (F0V64B), 5075 All-in-One Printer (M2U86B)</p>
            
    </div>
    <br/>
    <br/>
                                
 <button style="background-color: red;color:yellow ;font-style:bold;text-align:center;position:center"><a href="#portfolioModal1" class="portfolio-link" data-toggle="modal" >Produk Selanjutnya</a></button> <br/><br/>
                                <button type="button" class="btn btn-primary" onClick="document.location.reload(true)"><i class="fa fa-times"></i> Close Project</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
