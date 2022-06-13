<?php
session_start();
include 'config-konek.php';
$idpost = @$_GET["p"];
$penulis = @$_GET["a"];
if (@$_SESSION["user"]) {
if (@$_POST) {
    $komentari = mysqli_real_escape_string($db, $_POST["komentari"]);
    if (empty($komentari)) {
        echo "<script>alert('Tolong Masukan komentarnya!');</script>";
        echo "<script>history.go(-1);</script>";
    }
    else{
    	$datapost = mysqli_fetch_array(mysqli_query($db, "SELECT*FROM post WHERE id_post = '$idpost' AND penulis_post='$penulis'"));
    	$data2 = mysqli_fetch_array(mysqli_query($db, "SELECT*FROM user WHERE user_user='$_SESSION[user]'"));
        $userkomentarnya = $_SESSION["user"];
        date_default_timezone_set("Asia/Jakarta");
        $sekarangtanggalberapa = date("G:i d/m/Y");
        mysqli_query($db, "INSERT INTO komentar VALUES ('','$userkomentarnya','$komentari','$sekarangtanggalberapa','$idpost','$data2[pp_user]','$datapost[penulis_post]','1')");
        if ($datapost["penulis_post"] == $userkomentarnya) {
        echo "<script>history.go(-1);</script>";
        }else{
        mysqli_query($db, "UPDATE lihat SET lihat='1' WHERE user_lihat='$datapost[penulis_post]' AND apa_lihat='komentar'");
        echo "<script>history.go(-1);</script>";
    }
    }
}
}
else{

}
?>