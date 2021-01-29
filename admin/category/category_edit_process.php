<?php 
	$ID = $_GET['ID'];
	$name = $_POST['name'];
	include('../connect.php');
	$sql = "update category set name = '$name' where ID = '$ID'";
	mysqli_query($connect, $sql);
	include('../disconnect.php');
	header('location:index.php');