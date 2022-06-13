<?php
session_start();
include '../config-konek.php';
$id = $_GET["id"];
$data = mysqli_fetch_array(mysqli_query($db, "SELECT*FROM komentar WHERE id_komentar='$id'"));
if (@$_SESSION["user"] == $data["penulis_komentar"]) {
	mysqli_query($db, "DELETE FROM komentar WHERE id_komentar='$id' AND penulis_komentar='$_SESSION[user]'");
		header("location:../../?p=post&id=$data[id_post]&post_by=$data[penulis_post]#komentar");
}
elseif (@$_SESSION["user"] == $data["penulis_post"]) {
	mysqli_query($db, "DELETE FROM komentar WHERE id_komentar='$id' AND penulis_komentar='$data[penulis_komentar]'");
		header("location:../../?p=post&id=$data[id_post]&post_by=$data[penulis_post]#komentar");
}
else{
		header("location:../../error/");
}
?>