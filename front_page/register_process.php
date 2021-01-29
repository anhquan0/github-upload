<?php
	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	$date_of_birth = $_POST['date_of_birth'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$number_phone = $_POST['number_phone'];
	$address = $_POST['address'];
	if($password != $repassword) {
		header('location:../account');
	}
	include('../connect.php');
	$sql = "insert into account(name, username, password, date_of_birth, gender, email, number_phone, address) values('$name', '$username', '$password', '$date_of_birth', '$gender', '$email', '$number_phone', '$address')";
	mysqli_query($connect, $sql);
	include('../disconnect.php');
	$_SESSION['name'] = $name;
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password;

	header('location:../index.php');