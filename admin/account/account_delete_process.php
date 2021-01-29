<?php 
	session_start();
	include('../connect.php');	
	$ID = $_POST['ID'];
	$MY_ID = $_SESSION['ID'];
	if($ID == $MY_ID) {
		header('location:index.php');
		exit();
	}
	$sql = "delete from account where ID = '$ID'";

	$result	= mysqli_query($connect, $sql);
	header('location:index.php');