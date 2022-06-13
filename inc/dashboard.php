<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        #page-inner {
    width: 80%;
    margin: auto;
    background-color: #fff!important;
    padding: 10px;
    min-height: 1200px;
    box-shadow: 0px 0px 10px;
}

.alert-info {
  color: #000000;
  background-color: #d9edf7;
  border-color: #ffff;
}
.alert-info hr {
  border-top-color: #a6e1ec;
}
.alert-info .alert-link {
  color: #245269;
}
    </style>
</head>
<body>
<?php
if (@$_SESSION["user"]) {
    
?>
<title><?php echo $data2["nama_user"];?> | Beranda Kreasi Muda BPMPK</title>
<?php
}
else{
    ?>
<title>Beranda - Kreasi Muda BPMPK</title>

    <?php
}
?>
<div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                       <p align="center"><a href="./" ><img src="./galerikarya.png" width="300px" style="margin: 10px 10px 10px 20px;"></a></p>
                        <h1 class="page-subhead-line"><li class="fa fa-folder"></li> Halo! 
                        <?php
                        date_default_timezone_set("Asia/Jakarta");
                        $d = time();
                        $date = date("G", $d);
                        if ($date >= 0 && $date <= 10) {
                            echo "Selamat Pagi";
                        }
                        elseif ($date >= 11 && $date <= 14) {
                            echo "Selamat Siang";
                        }
                        elseif ($date >= 15 && $date <= 17) {
                            echo "Selamat Sore";
                        }
                        elseif ($date >= 18 && $date <= 23) {
                            echo "Selamat Malam";
                        }
                        ?>

                        <?php
                        if (@$_SESSION["user"]) {
                        ?>
                        <b><?php echo $data2["nama_user"];?> (<?php echo $data2["user_user"];?>)</b>! <a href="./?p=posting&profil=<?php echo $data2["user_user"];?>"><li class="fa fa-pencil"></li> Posting Karya Anda </a> Di Kreasi Muda BPMPK
                        <?php
                        }
                        else{
                            ?>
                            <b>Pengunjung</b>!
                            <br><br>
                             <div class="alert alert-warning">
                            <p class="fa fa-warning"> Harap <a href="./login" style="text-decoration: none; ">Login</a> Untuk Memposting Karya Kamu Di Kreasi Muda BPMPK</p>
                        </div>
                            <?php
                        }
                        ?>
                        </h1>

                        
                        
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
                <div class="alert alert-info" id="post<?php echo $datasqlpost["id_post"];?>">
                <span style="float:right;"><b>Diposting pada :<b/> <?php echo $datasqlpost["tanggal_post"];?></span>
                <a href="./?p=post&id=<?php echo $datasqlpost["id_post"];?>&post_by=<?php echo $datasqlpost["penulis_post"];?>"><h1><b><?php echo $datasqlpost["judul_post"];?></b></h1><h4><b>Ciptaan : <?php echo $datasqlpost["pemagang_post"];?></b></h4></a>
                <?php
                if ($datauserpost["pp_user"] == '') {
                ?>
                <a href="./?p=user&user=<?php echo $datasqlpost["penulis_post"];?>"><img src="./assets/img/user/users.png" style="width:40px;height:40px;border-radius:100%;"> <b><?php echo $datauserpost["nama_user"];?></b></a>
                <?php
                }
                else{
                ?>
                <a href="./?p=user&user=<?php echo $datasqlpost["penulis_post"];?>"><img src="./assets/img/user/<?php echo $datauserpost["pp_user"];?>" style="width:40px;height:40px;border-radius:100%;"> <b><?php echo $datauserpost["nama_user"];?></b></a>
                <?php
            }
                ?>
                <span style="float:right"><i class="fa fa-comment"></i> : <?php $totalkomentarpost = mysqli_num_rows(mysqli_query($db,"SELECT*FROM komentar WHERE id_post='$datasqlpost[id_post]'")); echo $totalkomentarpost;?></span>
                <hr>
 
                    <?php
                    if ($datasqlpost["gambar_post"] !== '') {
                    ?>
                    <center><a href="./assets/img/post/<?php echo $datasqlpost["gambar_post"];?>"><img style="position: relative; margin: auto;" src="./assets/img/post/<?php echo $datasqlpost["gambar_post"];?>" class="img img-thumbnail"></a></center>
                    <?php
                    }
                    else{

                    }
                     
                      
                   echo "<hr>";
                    echo "<strong>Deskripsi Karya : </strong>  ";
                    echo "<br>";
                    echo "'' "; echo$datasqlpost["isi_post"]; echo " ''";
                   

                    
                    ?><hr>

                <?php
                $sqllike = mysqli_query($db, "SELECT*FROM suka_post WHERE id_post='$datasqlpost[id_post]'");
                $siapayglike = mysqli_fetch_array($sqllike);
                
                ?>
                <i class="fa fa-thumbs-up"></i> : <?php echo $datasqlpost["suka_post"];?>
                <br><br>
                    <?php
                    $komentarnya = mysqli_query($db, "SELECT*FROM komentar WHERE id_post='$datasqlpost[id_post]' ORDER BY id_komentar ASC LIMIT 3");
                    
                    while ($datakomentarnya = mysqli_fetch_array($komentarnya)) {
                    $ygomen = mysqli_fetch_array(mysqli_query($db, "SELECT*FROM user WHERE user_user = '$datakomentarnya[penulis_komentar]'"));
                    if ($ygomen["pp_user"] == '') {
                    ?>
                    <img src="./assets/img/user/users.png" style="width:20px;height:20px;border-radius:100%"><b><a href="./?p=user&user=<?php echo $datakomentarnya["penulis_komentar"];?>"><?php echo $ygomen["nama_user"];?></a></b> : <?php echo $datakomentarnya["isi_komentar"];?><font style="float:right;"></font><br>
                    <?php
                    }
                    else{
                    ?>
                    <img src="./assets/img/user/<?php echo $ygomen["pp_user"];?>" style="width:20px;height:20px;border-radius:100%"><b><a href="./?p=user&user=<?php echo $datakomentarnya["penulis_komentar"];?>"><?php echo $ygomen["nama_user"];?></a></b> : <?php echo $datakomentarnya["isi_komentar"];?><font style="float:right;"></font><br>
                    <?php
                    }
                }
                $lala = mysqli_query($db, "SELECT*FROM komentar WHERE id_post='$datasqlpost[id_post]'");
                    if (mysqli_num_rows($lala) >= 4) {
                    	$totalngomeng = mysqli_num_rows(mysqli_query($db, "SELECT*FROM komentar WHERE id_post='$datasqlpost[id_post]'"));
                    	$dikurang = $totalngomeng - 3;
                    echo "<a href='./?p=post&id=$datasqlpost[id_post]&post_by=$datasqlpost[penulis_post]'>Lihat ($dikurang) Komentar Lagi...</a><br>";
                    }
                    if (@$_SESSION["user"]) {
                    ?>
                    <span>
                    <br>
                    <?php
                    $datasukapost = @mysqli_fetch_array(mysqli_query($db, "SELECT*FROM suka_post WHERE id_post='$datasqlpost[id_post]' AND user_suka='$_SESSION[user]'"));
                    if ($datasukapost["post_suka"] == 1) {
        ?>
        <button class="btn btn-danger"  onclick="window.location='./inc/unlike.php?id=<?php echo $datasqlpost["id_post"];?>&u=<?php echo $datasqlpost["penulis_post"];?>';"><i class="fa fa-thumbs-o-up"></i> Tarik Jempol</button>

        <?php
    }
    else{
    ?>
     <button class="btn btn-primary" onclick="window.location='./inc/like.php?id=<?php echo $datasqlpost["id_post"];?>&u=<?php echo $datasqlpost["penulis_post"];?>';"><i class="fa fa-thumbs-o-up"></i> Kasih Jempol</button>
<?php
}
?>
                                    <script>
                $(document).ready(function(){
                    $(".btn<?php echo $datasqlpost["id_post"];?>").click(function(){
                        $("blabla<?php echo $datasqlpost["id_post"];?>").show();
                    });
                });
                </script>
                    -  <button class="btn btn-info btn<?php echo $datasqlpost["id_post"];?>"><i class="fa fa-comment-o"></i>Comment</button></span><br><br>
                    <blabla<?php echo $datasqlpost["id_post"];?> hidden>
                    <form method="post" action="./inc/ngomen.php?p=<?php echo $datasqlpost["id_post"];?>&a=<?php echo $datasqlpost["penulis_post"];?>">
                    
                    <input autofocus required style="border:none;width:100%" name="komentari" placeholder="masukan komentar..." type="text"> <input hidden type="submit">
                    </form>

                    </blabla>
                    
                    <?php
                    }
                    else{
                    ?>
                    <a href="./login">Masuk Untuk Like dan Komen</a>
                    <?php
                    }
                    ?>
                    
                </div>
                <?php
                }
                ?>

                </div>

            </div>

            </body>
</html>