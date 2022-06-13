<?php
session_start();
include '../config-konek.php';
$id = $_GET["id"];
$u = $_SESSION["user"];
if (@$_SESSION["user"] = $u) {
	$hapus = mysqli_query($db, "DELETE FROM post WHERE id_post='$id' AND penulis_post='$u'");
	if ($hapus) {
	mysqli_query($db, "DELETE FROM komentar WHERE id_post='$id'");
	mysqli_query($db, "DELETE FROM suka_post WHERE id_post='$id'");
		header("location:../../?p=user&user=$u#post");
	}
	else{
		header("location:../../error/");
	}
}
else{
		header("location:.././error/");
}
?>