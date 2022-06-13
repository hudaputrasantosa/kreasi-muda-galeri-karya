<?php
session_start();
include '../inc/config-konek.php';
mysqli_query($db, "UPDATE user SET status_user='Offline' WHERE user_user='$_SESSION[user]'");
unset($_SESSION["user"]);
header("location:./");
?>