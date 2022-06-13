<?php
include 'config-konek.php';
session_start();
$u = $_GET["user"];
if (@$_SESSION["user"] == 'tegar') {
	mysqli_query($db, "DELETE FROM user WHERE user_user='$u'");
	mysqli_query($db, "DELETE FROM lihat WHERE user_lihat='$u'");
	header("location:../?p=daftar_pengguna");
}
else{
	header("location:./?p=beranda");
}
?>