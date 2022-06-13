<?php
    $useruser = $_GET["user"];
    $userquery = mysqli_query($db, "SELECT*FROM user WHERE user_user='$useruser'");
    $datauseruser = mysqli_fetch_array($userquery);

?>
<title><?php echo $datauseruser["nama_user"];?> | Profil - 8.5 Web Grup</title>
<?php
$cekpengguna = mysqli_num_rows($userquery);
if (empty($cekpengguna)) {
    echo "<div class='alert alert-danger'>Pengguna Dengan Username <b>@$useruser</b> Tidak Ada. Mungikin Sudah Dihapus Atau Kesalahan Pada URL <a href='./?p=daftar_pengguna'>Lihat Semua Pengguna</a></div>";
}
elseif (@$_SESSION["user"] == $useruser) {
?>
<div id="page-inner">
<?php
if ($datauseruser["pp_user"] == '') {
?>
<a target="blank" href="./assets/img/user/users.png"><img style="float:left; margin-right:10px;width:250px;height:250px;" src="./assets/img/user/users.png" class="img-thumbnail"></a>
<?php
}
else{
?>
<a target="blank" href="./assets/img/user/<?php echo $datauseruser["pp_user"];?>"><img style="float:left; margin-right:10px;width:250px;height:250px;" src="./assets/img/user/<?php echo $datauseruser["pp_user"];?>" class="img-thumbnail"></a>
<?php
}
?>
<div style="position:absolute;">
<a href="./?p=edit&profil=<?php echo $data2["user_user"];?>#ubah-foto" class="btn btn-info"><li class="fa fa-camera"></li> Ubah Atau Reset Foto Profil</a><br>
</div>
<b style="font-size:30px;""><?php echo $datauseruser["nama_user"];?></b>
<?php
if ($datauseruser["status_user"] == 'Online') {
    echo "<a title='Sedang Online' href='#' class='btn btn-success btn-circle' style='width:10px;height:10px;'></a>  ";
}
if ($datauseruser["status_user"] == 'Offline') {
    echo "<a title='Sedang Offline' href='#' class='btn btn-default btn-circle' style='width:10px;height:10px;'></a>  ";
}
?>
<a href="./?p=edit&profil=<?php echo $data2["user_user"];?>" style="float:right;font-size:15px;">Edit Profil</a><br>
<font style="font-size:20px;"><?php echo $datauseruser["user_user"];?></font><br><br>
<b>Tanggal Lahir :</b> <i><?php echo $datauseruser["tanggal_lahir_user"];?> <?php echo $datauseruser["bulan_lahir_user"];?> <?php echo $datauseruser["tahun_lahir_user"];?></i><br>
<b>Jenis Kelamin :</b> <i><?php echo $datauseruser["jk_user"];?></i><br>
<b>No. Hp :</b> <i><?php echo $datauseruser["hp_user"];?></i><br>
<b>Alamat :</b> <i><?php echo $datauseruser["alamat_user"];?></i><br>
<b>Galeri :</b> <i><a href="./?p=galeriku&by=<?php echo $datauseruser["user_user"];?>"">Buka Galeri <b><?php echo $datauseruser["nama_user"];?></b></a></i>
<br><br>

<div style="margin-top:90px;">
    <b>Deskripsi Tentang Saya :</b><br> <div class="img-thumbnail"><?php echo $datauseruser["bio_user"]; if($datauseruser["bio_user"] == ''){echo "*Tidak Ditampilkan*";}?></div>
</div>
            <div style="margin-top:100px;padding:10px;" id="post">
            <?php
            $postingandariuser = mysqli_query($db, "SELECT*FROM post WHERE penulis_post='$datauseruser[user_user]' ORDER BY id_post DESC LIMIT 7");
                        ?>
                <div class="panel-group">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h4>Postingan Karya Dari <b><?php echo $datauseruser["nama_user"];?></b> <a href="./?p=posting&profil=<?php echo $data2["user_user"];?>">  + Posting Karya Baru</a></h4>
                        </div>
                        <div class="panel-body">
                         <table class="table">
                                <thead>
                            <tr>
                                    <th><i class="fa fa-thumbs-o-up"></i></th>
                                    <th>Post</th>
                                    <th>Pada</th>
                                    <th>Komentar</th>
                                    <th>---</th>
                            </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $batas = 10;
                                
                                if (isset($_GET["hal"])) {
                                    $hal = $_GET["hal"];
                                    $posisi = ($hal-1)*$batas;
                                }
                                else{
                                    $hal = 1;
                                    $posisi = 0;
                                }
                                $querypostuser = mysqli_query($db, "SELECT*FROM post WHERE penulis_post='$datauseruser[user_user]' ORDER BY id_post DESC LIMIT $posisi, $batas");
                                $hitungpost = @mysqli_num_rows($querypostuser);
                                if (empty($hitungpost)) {
                                    echo "<div class='alert alert-warning'>Tidak Ada Postingan</div>";
                                }
                                else{

                                while ($datapostuser = mysqli_fetch_array($querypostuser)) {
                                ?>
                                    <tr>
                                        <td><?php echo $datapostuser["suka_post"];?></td>
                                        <td><a href="./?p=post&id=<?php echo $datapostuser["id_post"];?>&post_by=<?php echo $datapostuser["penulis_post"];?>"><?php echo $datapostuser["judul_post"];?></a></td>
                                        <td><?php echo $datapostuser["tanggal_post"];?></td>
                                        <td><?php $querykomentarkece = mysqli_query($db, "SELECT*FROM komentar WHERE id_post='$datapostuser[id_post]'"); $totalkomenkece = mysqli_num_rows($querykomentarkece); echo $totalkomenkece;?> Komentar</td>
                                        <td><a href="./inc/hapus-post?id=<?php echo $datapostuser["id_post"];?>&u=<?php echo $datapostuser["penulis_post"];?>" class="btn btn-danger" onclick="return confirm('Hapus Postingan Ini Dan Semua Komentar Di Dalamnya?')">Hapus</a></td>
                                    </tr>
                                <?php
                                }
                            }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="panel-footer">
                            <?php
                            $query2 = mysqli_query($db, "SELECT*FROM post WHERE penulis_post='$datauseruser[user_user]'");
                            $hitung2 = mysqli_num_rows($query2);
                            $bagi = @ceil($hitung2/$batas);
                            
                            for ($i=1; $i <= $bagi; $i++) { 
                                if ($hal==$i) {
                                    echo "<span style='background:grey;border-radius:100%;padding:10px;color:lightblue;'>$i</span> ";
                                }
                                else{
                                    echo "<a href='./?user&user=$datauseruser[user_user]&hal=$i#post'><span class='badge'>$i</span></a> ";
                                }
                            
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            </div>
<?php
}
else{
?>
<div id="page-inner">
<?php
if ($datauseruser["pp_user"] == '') {
?>
<a target="blank" href="./assets/img/user/users.png"><img style="float:left; margin-right:10px;width:250px;height:250px;" src="./assets/img/user/users.png" class="img-thumbnail"></a>
<?php
}
else{
?>
<a target="blank" href="./assets/img/user/<?php echo $datauseruser["pp_user"];?>"><img style="float:left; margin-right:10px;width:250px;height:250px;" src="./assets/img/user/<?php echo $datauseruser["pp_user"];?>" class="img-thumbnail"></a>
<?php
}
?>
<b style="font-size:30px;"><?php echo $datauseruser["nama_user"];?></b>
<?php
if ($datauseruser["status_user"] == 'Online') {
    echo "<a title='Sedang Online' href='#' class='btn btn-success btn-circle' style='width:10px;height:10px;'></a>  ";
}
if ($datauseruser["status_user"] == 'Offline') {
    echo "<a title='Sedang Offline' href='#' class='btn btn-default btn-circle' style='width:10px;height:10px;'></a>  ";
}
?><br>
<?php echo $datauseruser["user_user"];?><br><br>
<b>Jenis Kelamin :</b> <i><?php echo $datauseruser["jk_user"];?></i><br>
<b>Tanggal Lahir :</b> <i><?php echo $datauseruser["tanggal_lahir_user"];?> <?php echo $datauseruser["bulan_lahir_user"];?> <?php echo $datauseruser["tahun_lahir_user"];?></i><br>
<b>No. Hp :</b> <i><?php echo $datauseruser["hp_user"];?></i><br>
<b>Alamat :</b> <i><?php echo $datauseruser["alamat_user"];?></i><br>
<b>Galeri :</b> <i><a href="./?p=galeriku&by=<?php echo $datauseruser["user_user"];?>"">Buka Galeri <b><?php echo $datauseruser["nama_user"];?></b></a></i>
<br><br>

<div style="margin-top:70px;">
     <b>Deskripsi Tentang <?php echo $datauseruser["nama_user"];?> :</b><br> <div class="img-thumbnail"><?php echo $datauseruser["bio_user"]; if($datauseruser["bio_user"] == ''){echo "*Tidak Ditampilkan*";}?></div>
</div>

            <div style="margin-top:100px;" id="post">
            <?php
            $postingandariuser = mysqli_query($db, "SELECT*FROM post WHERE penulis_post='$datauseruser[user_user]' ORDER BY id_post DESC LIMIT 7");
                        ?>
                <div class="panel-group">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h4>Postingan Dari <b><?php echo $datauseruser["nama_user"];?></b></h4>
                        </div>
                        <div class="panel-body">
                        <table class="table">
                                <thead>
                            <tr>
                                    <th><i class="fa fa-thumbs-o-up"></i></th>
                                    <th>Post</th>
                                    <th>Pada</th>
                                    <th>Komentar</th>
                            </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $batas = 10;
                                
                                if (isset($_GET["hal"])) {
                                    $hal = $_GET["hal"];
                                    $posisi = ($hal-1)*$batas;
                                }
                                else{
                                    $hal = 1;
                                    $posisi = 0;
                                }
                                $querypostuser = mysqli_query($db, "SELECT*FROM post WHERE penulis_post='$datauseruser[user_user]' ORDER BY id_post DESC LIMIT $posisi, $batas");
                                $hitungpost = @mysqli_num_rows($querypostuser);
                                if (empty($hitungpost)) {
                                    echo "<div class='alert alert-warning'>Tidak Ada Postingan</div>";
                                }
                                else{

                                while ($datapostuser = mysqli_fetch_array($querypostuser)) {
                                ?>
                                    <tr>
                                        <td><?php echo $datapostuser["suka_post"];?></td>
                                        <td><a href="./?p=post&id=<?php echo $datapostuser["id_post"];?>&post_by=<?php echo $datapostuser["penulis_post"];?>"><?php echo $datapostuser["judul_post"];?></a></td>
                                        <td><?php echo $datapostuser["tanggal_post"];?></td>
                                        <td><?php $querykomentarkece = mysqli_query($db, "SELECT*FROM komentar WHERE id_post='$datapostuser[id_post]'"); $totalkomenkece = mysqli_num_rows($querykomentarkece); echo $totalkomenkece;?> Komentar</td>
                                    </tr>
                                <?php
                                }
                            }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="panel-footer">
                            <?php
                            $query2 = mysqli_query($db, "SELECT*FROM post WHERE penulis_post='$datauseruser[user_user]'");
                            $hitung2 = mysqli_num_rows($query2);
                            $bagi = @ceil($hitung2/$batas);
                            
                            for ($i=1; $i <= $bagi; $i++) { 
                                if ($hal==$i) {
                                    echo "<span style='background:grey;border-radius:100%;padding:10px;color:lightblue;'>$i</span> ";
                                }
                                else{
                                    echo "<a href='./?user&user=$datauseruser[user_user]&hal=$i#post'><span class='badge'>$i</span></a> ";
                                }
                            
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
}
            ?>