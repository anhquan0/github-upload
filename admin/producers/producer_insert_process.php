<?php 
	$name = $_POST['name'];
	include('../connect.php');
	$sql = "insert into producers(name) values('$name')";
	mysqli_query($connect, $sql);
	include('../disconnect.php');
	header('location:index.php');
?>