<?php session_start(); 
	if(empty($_SESSION['username'])) {
		header('location:../index.php');
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		List of products
	</title>
	<style type="text/css">
		.detailed_product_photo {
			width: 100%;
			display: block;
			margin-left: auto;
			margin-right: auto;
		}
		.photo {
			height: 60%;
			width: 100%;
			background-position: center center;
			background-size: cover;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="../menu/style_hello.css">
	<link rel="stylesheet" href="../menu/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../menu/w3.css">
	<link rel="stylesheet" type="text/css" href="../menu/style.css">
</head>
<body>
<?php include('../menu/index.php') ?>

<div style="margin-left: 15%">
	<div class="w3-container w3">
	  	<div class="container">
	  		<div class="w3-container_left">
	 	 		<h1>Products</h1>
	  		</div>

	  		<div class="w3-container_middle">
	  			<br>
	  			<div class="active-pink-3 active-pink-4 mb-4">
	  				<form>
	  					<input class="form-control" type="text" placeholder="Search" aria-label="Search" name="search">
	  				</form>
					
				</div>
	  		</div>
		  	<div class="w3-container_right">
			  	<h3>
			  		<?php echo "Xin chao ".$_SESSION['username'] ?>
			  	</h3>
			  	<a href="../../index.php">Front page</a>
		  	</div>
	  	</div>
	</div>
	<div class="container">
		<?php 
			include('product_view.php');
		?>
	</div>
</div>

<script src="../menu/jQuery.js"></script>
<script src="../menu/Popper.min.js"></script>
<script src="../menu/bootstrap.min.js"></script>
</body>
</html>