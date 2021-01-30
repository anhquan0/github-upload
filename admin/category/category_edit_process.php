<?php 
	$ID = $_GET['ID'];
	$name = $_POST['name'];
	include('../connect.php');
	$sql = "select * from category where name = '$name' and ID != '$ID'";
	$result = mysqli_num_rows(mysqli_query($connect, $sql));
	if($result != 0 || $name = '') {
		header('location:index.php');		
	}
	$sql = "update category set name = '$name' where ID = '$ID'";
	mysqli_query($connect, $sql);
	include('../disconnect.php');
	header('location:index.php');