<?php 
	$ID = $_GET['ID'];
	include('../connect.php');
	$sql = "delete from producers where producers.ID = '$ID'";
	mysqli_query($connect, $sql);
	include('../disconnect.php');
	header('location:index.php');
?>