<?php 
	$ID = $_GET['ID'];
	include('../connect.php');
	$sql = "delete from category where category.ID = '$ID'";
	mysqli_query($connect, $sql);
	include('../disconnect.php');
	header('location:index.php');