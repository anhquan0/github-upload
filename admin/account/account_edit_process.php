<?php 
	include('../connect.php');
	$feedback = "";
	$ID = $_POST['ID'];
	$name = $_POST['name'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$number_phone = $_POST['number_phone'];	
//Tra ve san pham trung	
	$sql = "select * from account where username = '$username' and ID != '$ID'";
	$result = mysqli_num_rows(mysqli_query($connect, $sql));
	if($result != 0) {
		$feedback = "username";
	}
	$sql = "select * from account where email = '$email' and ID != '$ID'";
	$result = mysqli_num_rows(mysqli_query($connect, $sql));
	if($result != 0) {
		$feedback .= ",email";
	}
	$sql = "select * from account where number_phone = '$number_phone' and ID != '$ID'";
	$result = mysqli_num_rows(mysqli_query($connect, $sql));
	if($result != 0) {
		$feedback .= ",number_phone";
	}
	if($feedback != "") {
		$feedback = "location:../account?".$feedback."_already_exists";
		header("$feedback");
		exit();
	}
//
	$password = $_POST['password'];
	$level = $_POST['level'];
	$date_of_birth = $_POST['date_of_birth'];
	$gender = $_POST['gender'];

	$address = $_POST['address'];
	$sql = "update account set name = '$name', username = '$username', password = '$password', level = '$level', date_of_birth = '$date_of_birth', gender = '$gender', email = '$email', number_phone = '$number_phone', address = '$address' where ID = '$ID'";
	//die($sql);
	mysqli_query($connect, $sql);
	include('../disconnect.php');
	header("location:index.php");