<?php
include 'config-konek.php';
session_start();
if (@$_SESSION["user"]) {
	$id = @$_GET["id"];
	$p = @$_GET["u"];
	$query = mysqli_query($db, "SELECT*FROM post WHERE id_post='$id'");
	$data = mysqli_fetch_array($query);
	$suka = $data["suka_post"];
	$tambah = $suka + 1;
	$datapos = mysqli_fetch_array(mysqli_query($db, "SELECT*FROM suka_post WHERE user_suka='$_SESSION[user]' AND id_post='$id'"));
	if ($datapos["post_suka"] == 1) {
		header("location:../?p=post&id=$id&post_by=$p");
	}
	else{

	$ubah = mysqli_query($db, "UPDATE post SET suka_post='$tambah' WHERE id_post='$id'");
	if ($ubah) {
		date_default_timezone_set("Asia/Jakarta");
		$d = date("G:i d/m/Y");
		mysqli_query($db, "INSERT INTO suka_post VALUES('','$_SESSION[user]','$id','1','$data[penulis_post]','$d','1')");
		mysqli_query($db, "UPDATE lihat SET lihat='1' WHERE apa_lihat='like' AND user_lihat='$p' AND user_lihat != '$_SESSION[user]'");
		mysqli_query($db, "UPDATE post SET lihat_post='1' WHERE penulis_post='$p'");
		header("location:../?p=beranda#post$id");
	}
	else{
		header("location:../?p=beranda#post$id");
	}
}
	}
else{
		header("location:../login");

}
?>