<?php $database = include("./configs/db.php");
	
$link = mysqli_connect($database['servername'], $database['username'], $database['password'], $database['database']);
$conn = new mysqli($database['servername'], $database['username'], $database['password'], $database['database']);
?>