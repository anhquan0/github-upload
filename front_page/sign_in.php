<?php  
	session_start();
	if(isset($_SESSION['username'])) {
		header('location:../index.php');
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	</style>
	<link rel="stylesheet" type="text/css" href="../front_page/overall_style.css">
	<link rel="stylesheet" type="text/css" href="../front_page/main_div.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>
<div class="overall">
	<?php include('../front_page/header.php') ?>
	<div class="middle">
		<form action="sign_in_process.php" method="post">
			<div align="center" style="padding-top: 100px; padding-bottom: 10px;">
				<div>
					<label for="username">Username</label>
					<input type="text" name="username" id="username" style="padding: 7px;">
					<br>
					<br>
					<label for="password">Password</label>
					<input type="password" name="password" id="password" style="padding: 7px;">
				</div>
			</div>
			<div align="center">
				<button class="btn btn-primary" style="padding: 5px;">Sign In</button>
			</div>
		</form>
	</div>
	<?php include('../front_page/footer.php') ?>
</div>
</body>
</html>