<?php
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	include('../admin/connect.php');
	$sql = "select * from account where username = '$username' and password = '$password'";
	$result = mysqli_query($connect, $sql);
	$each = mysqli_fetch_array($result);
	if($password === $each['password'] && $username === $each['username']) {
		// $_SESSION['name'] = $each['name'];
		$_SESSION['username'] = $each['username'];
		$_SESSION['ID'] = $each['ID'];
		if($each['level'] == 1) {
			header('location:../front_page/index.php');
			exit();
		}
		else {
			$_SESSION['level'] = 2;
			if($each['level'] == 3) $_SESSION['level'] = 3;
			header('location:../admin/account');
			exit();
		}
	}
	else {
		header('location:index.php?error:_username_or_password_maybe_wrong');
	}
	