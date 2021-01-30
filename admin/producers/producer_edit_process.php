<?php 
	$name = $_POST['name'];
	$ID = $_GET['ID'];
	include('../connect.php');
	$sql = "select * from producers where name = '$name' and ID = '$ID'";
	$result = mysqli_num_rows(mysqli_query($connect, $sql));
	if($result != 0 || $name == '') {
		header('location:index.php');
		exit();
	}
	$sql = "update producers set name = '$name' where ID = '$ID'";
	mysqli_query($connect, $sql);
	include('../disconnect.php');
	header('location:index.php');
?>