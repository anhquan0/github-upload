<?php 
	$ID = $_GET['ID'];
	include('../connect.php');
	$sql = "delete from account where ID = '$ID'";
	$result	= mysqli_query($connect, $sql);
	header('location:index.php');