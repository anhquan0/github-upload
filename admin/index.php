<?php 
	session_start();
	if(isset($_SESSION['username'])) {
		header('location:../front_page/index.php');
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
	<link rel="stylesheet" type="text/css" href="menu/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>
<div class="overall">
	<?php include('../front_page/header.php') ?>
	<div class="middle">
		<form action="sign_in_process.php" method="post">
			<div class="modal-body" align="center" style="padding-top: 100px">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" name="username" id="username"><br>
					<label for="password">Password</label>
					<input type="password" name="password" id="password">
				</div>
			</div>
			<div align="center">
				<button class="btn btn-primary">Sign In</button>
			</div>
		</form>
	</div>
	<?php include('../front_page/footer.php') ?>
</div>
</body>
</html>