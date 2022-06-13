<?php
mysqli_query($db, "UPDATE lihat SET lihat='0' WHERE user_lihat='$_SESSION[user]' AND apa_lihat='komentar'");
    $useruser = @$_GET["post_user"];
    $userquery = mysqli_query($db, "SELECT*FROM user WHERE user_user='$useruser'");
    $datauseruser = mysqli_fetch_array($userquery);

?>
<title><?php echo $datauseruser["nama_user"];?> | Notifikasi Komentar - 8.5 Web Grup</title>
<?php
if (@$_SESSION["user"] == $useruser) {
    ?>
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
            <h3 class="page-head-line">Notifikasi Komentar Pada Postingan</h3>
            <h3 class="page-subhead-line">Jika Pengguna Lain Ngomenin Postingan <b><?php echo $data2["nama_user"];?></b>, Maka Akan Tampil Disini</h3>
            
            <div>
                <?php
                $batas = 10;

                if (isset($_GET["hal"])) {
                    $hal = (int)$_GET["hal"];
                    $posisi = ($hal-1)*$batas;
                }
                else{
                    $hal = 1;
                    $posisi = 0;
                }
                $querykomentarnya = mysqli_query($db, "SELECT*FROM komentar WHERE penulis_post='$data2[user_user]' ORDER BY id_komentar DESC LIMIT $posisi, $batas");
                $hitung = mysqli_num_rows($querykomentarnya);

                if (empty($hitung)) {
                    echo "<div class='alert alert-warning'>Belum Ada Komentar Lagi Di Postingan Kamu</div>";
                }
                else{

                while ($datakomennya = mysqli_fetch_array($querykomentarnya)) {
                    $datakomentar = mysqli_fetch_array(mysqli_query($db, "SELECT*FROM user WHERE user_user='$datakomennya[penulis_komentar]'"));
                    $queryposnya = mysqli_query($db, "SELECT*FROM post WHERE id_post='$datakomennya[id_post]'");
                    $datapostnya = mysqli_fetch_array($queryposnya);
                    $judulpostnya = $datapostnya["judul_post"];
                    if ($datakomennya["lihat_komentar"] == 1 && $datakomennya["penulis_komentar"] !== $_SESSION["user"]) {
                   ?>
                   <div class='alert alert-warning'><small><?php echo $datakomennya["tanggal_komentar"];?></small><br><i class='fa fa-comment-o'></i>  
                   <span class="badge">Baru!</span> <?php
        if ($datakomentar["pp_user"] == '') {
        ?>
        <img src="./assets/img/user/user.jpg" style="width:25px;height:25px;border-radius:100%;">
        <?php
        }
        else{
        ?>
        <img src="./assets/img/user/<?php echo $datakomentar["pp_user"];?>" style="width:25px;height:25px;border-radius:100%;">
        <?php
        }
        ?><b><a href="./?p=user&user=<?php echo $datakomennya["penulis_komentar"];?>">@<?php echo $datakomennya["penulis_komentar"];?></a></b> Ngomenin Postingan <b><a href="./?p=post&id=<?php echo $datapostnya["id_post"];?>&post_by=<?php echo $datapostnya["penulis_post"];?>#komentar_<?php echo $datakomennya["id_komentar"];?>"><?php echo $judulpostnya;?></a></b> Kamu</div>
                   <?php
               }
                elseif ($datakomennya["penulis_komentar"] !== $_SESSION["user"]){
                ?>
                <div class='alert alert-info'><small><?php echo $datakomennya["tanggal_komentar"];?></small><br><i class='fa fa-comment-o'></i>
        <b><a href="./?p=user&user=<?php echo $datakomennya["penulis_komentar"];?>"><?php if ($datakomentar["pp_user"] == '') {
        ?>
        <img src="./assets/img/user/user.jpg" style="width:25px;height:25px;border-radius:100%;">
        <?php
        }
        else{
        ?>
        <img src="./assets/img/user/<?php echo $datakomentar["pp_user"];?>" style="width:25px;height:25px;border-radius:100%;">
        <?php
        }
        ?>@<?php echo $datakomennya["penulis_komentar"];?></a></b> Ngomenin Postingan <b><a href="./?p=post&id=<?php echo $datapostnya["id_post"];?>&post_by=<?php echo $datapostnya["penulis_post"];?>#komentar_<?php echo $datakomennya["id_komentar"];?>"><?php echo $judulpostnya;?></a></b> Kamu</div>
                <?php
            }
            }
                }
                $hitung2 = mysqli_num_rows(mysqli_query($db, "SELECT*FROM komentar WHERE penulis_post='$useruser'"));
                $bagi = ceil($hitung2/$batas);
                for ($i=1; $i <= $bagi ; $i++) { 
                    if ($hal==$i) {
                                    echo "<span style='background:grey;border-radius:100%;padding:10px;color:lightblue;'>$i</span> ";
                                }
                                else{
                                    echo "<a href='./?p=komentar&post_user=$_SESSION[user]&hal=$i'><span class='badge'>$i</span></a> ";
                                }
                }
                mysqli_query($db, "UPDATE komentar SET lihat_komentar='0' WHERE penulis_post='$_SESSION[user]'");
                ?>
            </div>
            </div>
        </div>
    </div>
<?php
}
else{
echo "<script>window.location='./?p=komentar&post_user=$_SESSION[user]';</script>";
}
            ?>