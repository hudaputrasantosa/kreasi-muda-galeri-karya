<?php
include 'config-konek.php';
session_start();
if (@$_SESSION["user"]) {
	$id = @$_GET["id"];
	$p = @$_GET["u"];
	$query = mysqli_query($db, "SELECT*FROM post WHERE id_post='$id'");
	$data = mysqli_fetch_array($query);
	$suka = $data["suka_post"];
	$tambah = $suka - 1;
	$datapos = mysqli_fetch_array(mysqli_query($db, "SELECT*FROM suka_post WHERE user_suka='$_SESSION[user]' AND id_post='$id'"));
	if ($datapos["post_suka"] == 1) {
	$ubah = mysqli_query($db, "UPDATE post SET suka_post='$tambah' WHERE id_post='$id'");
	if ($ubah) {
		mysqli_query($db, "DELETE FROM suka_post WHERE user_suka='$_SESSION[user]' AND id_post='$id'");
		header("location:../?p=beranda#post$id");
	}
	else{
		header("location:../?p=beranda#post$id");
	}
	}
	else{
		header("location:../?p=beranda#post$id");
}
}
else{
		header("location:../login");

}
?>