<?php
    $useruser = @$_GET["profil"];
    $userquery = mysqli_query($db, "SELECT*FROM user WHERE user_user='$useruser'");
    $datauseruser = mysqli_fetch_array($userquery);

?>
<title><?php echo $datauseruser["nama_user"];?> | Posting Karya - Kreasi Muda bpmpk</title>
<?php
$cekpengguna = mysqli_num_rows($userquery);
if (@$_SESSION["user"] == $useruser) {
?>
<div id="page-inner">
 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Posting Karya</h1>
                        <h1 class="page-subhead-line"><li class="fa fa-pencil fa-spin"></li> Pajang Karya anda di Kreasi Muda BPMPK</h1>
                  
            </div>
            </div>

            <form method="post" action="" enctype="multipart/form-data">
            <?php
            if (@$_POST["submit"]) {
            date_default_timezone_set("Asia/Jakarta");
                 $dt = date("Ymd_Gis");
            $gambar = @$_FILES["gambar"]["tmp_name"];
            $alamat_gambar = @$_FILES["gambar"]["name"];
            $folder = "assets/img/post/";
            $foldermin = "assets/img/post-admin-herp-id/";

            $file = @$_FILES["file"]["tmp_name"];
            $alamat_file = @$_FILES["file"]["name"];
            $folderr = "inc/files/";
            $folderminn = "inc/files/";

           
            $pindah = move_uploaded_file($gambar, $folder.$dt.$alamat_gambar);
            $pindahh = move_uploaded_file($file, $folderr.$dt.$alamat_file);

            $judul = mysqli_real_escape_string($db, $_POST["judul"]);
            $isi = mysqli_real_escape_string($db, $_POST["isi"]);
            $pembimbing = mysqli_real_escape_string($db, $_POST["pembimbing"]);
            $pemagang = mysqli_real_escape_string($db, $_POST["pemagang"]);
            $periode = mysqli_real_escape_string($db, $_POST["periode"]);

            $date = date("G:i d/m/Y");

            if ($pindah) {
                mysqli_query($db, "INSERT INTO post VALUES('','$judul','$pemagang','$periode','$dt$alamat_file','$isi','$pembimbing','$useruser','$date','$dt$alamat_gambar','0')");
                echo "<div class='alert alert-info'>Postingan Telah Ditambahkan. <a href='./?p=user&user=$data2[user_user]#post'>Lihat Semua Postingan Kamu</a></div>";
            }
            else{
                mysqli_query($db, "INSERT INTO post VALUES('','$judul','$pemagang','$periode','$alamat_file','$isi','$pembimbing','$useruser','$date','','0')");
                echo "<div class='alert alert-info'>Postingan Telah Ditambahkan. <a href='./?p=user&user=$data2[user_user]#post'>Lihat Semua Postingan Kamu</a></div>";
            }
            }
            ?>
            <div>
                <input type="file" name="gambar">
                <label>Tambah Gambar (*untuk ikon karya)</label>
            </div>
            <div style="margin-top:20px; border: 20px;">
                <input title="Masukan Judul Postingan" required type="text" name="judul" placeholder=" Masukan Judul" style="height:50px;width:100%;font-size:15px;">
                <hr>
                <div style="margin-top:20px; border: 20px;">
                    <input title="Nama Pemagang" required type="text" name="pemagang" placeholder=" Nama Pemagang" style="height:50px;width:100%;font-size:15px;">
                </div><br>
 <div style="margin-top: 10px; border: 20px;">
               <input title="Masukkan pembimbing Postingan" required type="text" name="pembimbing" placeholder="Pembimbing" style="height:50px;width:100%;font-size:15px;">
                </div><br>

                <form method='POST' action=''>
<h4>Periode Prakrin</h4>
<h5><select name="periode">
<option value="Juli 2017">Juli 2017</option>
<option value="Oktober 2017">Oktober 2017</option>
<option value="Januari 2018">Januari 2018</option>
<option value="Juli 2018 ">Juli 2018</option>
<option value="Oktober 2018">Oktober 2018</option>
</select>

</h5>
</form>

<div>
    <input type="file" name="file">
    <label> Maksimal File 300 MB </label>
</div>
                <div style="margin-top:20px; border:5px;">
                    <textarea title="Masukan Isi Postingan" name="isi" rows="8" style="border:none;font-size:17px;width:100%;" placeholder="Deskripsi ..."></textarea>
                </div><br>
    
                <div><input type="submit" name="submit" value="Posting" class="btn btn-primary" style="width:100%;"></div>
            </form>
            </div>
<?php
}
else{
?>
<script>window.location='.?p=posting&profil=<?php echo $data2["user_user"];?>';</script>
            <?php
}
            ?>