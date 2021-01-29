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
		List of category
	</title>
	<script src="../menu/jQuery.js"></script>
	<script src="../menu/Popper.min.js"></script>
	<script src="../menu/bootstrap.min.js"></script>
	<script type="text/javascript" src="../menu/jquery.validate.min.js"></script>
	<script src="validation.js"></script>
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
	 	 		<h1>Category</h1>
	  		</div>
	  		<div class="w3-container_middle">
	  			<br>
	  			<div class="active-pink-3 active-pink-4 mb-4">
					<input class="form-control" type="text" placeholder="Search" aria-label="Search">
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
		<div>
			<?php 
				include('category_view.php');
			?>
		</div>
	</div>
</div>

</body>
</html>