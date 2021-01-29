<?php 
	$name = $_POST['name'];
	$ID = $_GET['ID'];
	include('../connect.php');
	$sql = "update producers set name = '$name' where ID = '$ID'";
	mysqli_query($connect, $sql);
	include('../disconnect.php');
	header('location:index.php');
?>