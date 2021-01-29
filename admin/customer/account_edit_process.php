<?php 
	session_start();
	include('../connect.php');
	$email = $_POST['email'];
	$number_phone = $_POST['number_phone'];
	$sql1 = "select * from account where username = '$username' or  email = '$email' or number_phone = '$number_phone'";
	$result = mysqli_num_rows(mysqli_query($connect, $sql1));
	if($result != 0) {
		header("location:index.php?username_or_email_or_number_phone_already_exists");
		exit();
	}
	$ID = $_GET['ID'];
	$name = $_POST['name'];
	$date_of_birth = $_POST['date_of_birth'];
	$gender = $_POST['gender'];	
	$address = $_POST['address'];
	$sql = "update account set name = '$name',";
	if($_SESSION['level'] == 3) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = "$sql username = '$username', password = '$password',";
	}


	$sql = "$sql date_of_birth = '$date_of_birth', gender = '$gender', email = '$email', number_phone = '$number_phone', address = '$address' where ID = '$ID'";

	mysqli_query($connect, $sql);
	include('../disconnect.php');
	header("location:index.php");