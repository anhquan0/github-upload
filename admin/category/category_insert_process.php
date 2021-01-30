<?php 
	$name = $_POST['name'];
	include('../connect.php');
	$sql = "select * from category where name = '$name'";
	$result = mysqli_num_rows(mysqli_query($connect,$sql));
	
	if($result == 0 || $name == '') {
		header('location:index.php');
		exit();		
	}
	$sql = "insert into category(name) values('$name')";
	mysqli_query($connect, $sql);
	die($sql);
	include('../disconnect.php');
	header('location:index.php');