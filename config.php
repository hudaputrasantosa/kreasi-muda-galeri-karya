<?php
$conn = mysqli_connect('localhost', 'root', '', 'navbar');
if($conn->connect_error){
	die("Fatal Error: Can't connect to database: ". $conn->connect_error);
}
?>