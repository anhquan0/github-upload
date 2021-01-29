<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../front_page/main_div.css">
	<style type="text/css">
		.games_list {
			width: 100%;
			height: 550px;
		}
		.games_overview {
			width: 19%;
			height: 500px;
			float: left;
			border-style: solid;
			margin: 2% 2.5% 2%;
			background: white;
		}
		.games_overview > .photo {
			height: 60%;
			width: 100%;
			background-position: center center;
			background-size: cover;
		}
		.games_overview > .title {
			width: 100%;
			height: 15%;
			text-align: center;
		}
		.games_overview > .price {
			width: 100%;
			height: 10%;
			text-align: center;
			color: #f20f22;
			font-weight: bold;
			margin: 0;
		}
		.games_overview > .add_to_cart {
			width: 100%;
			height: 10%;
			text-align: center;
			border-top: solid;
			padding-top: 15px;
		}
		.add_to_cart:hover {
			/*background-color: #33b3de;*/
		}
	</style>
	<link rel="stylesheet" type="text/css" href="../front_page/overall_style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>
<div class="middle">
		<div class="middle_inner">
			<?php include('../front_page/catalogue.php') ?>
			<div class="content_main">
				<?php 
					$image_folder = '../admin/product_images/';
					include'../admin/connect.php';
				?>

				<?php if (isset($_GET['producer_ID'])) {
					$producer_ID = $_GET['producer_ID'];
					$sql = "select * from products where producer_ID = '$producer_ID'";
				$result = mysqli_query($connect,$sql);
				foreach ($result as $each) { ?>
						<div class="games_overview" id="nintendo_games">
						 	<div class="photo" style="background-image: url('<?php echo $image_folder.$each['photo'] ?>');">
						 	</div>
						 	<div class="title">
						 		<h2>
						 			<a href="detailed_product.php?ID=<?php echo $each['ID'] ?>&&producer_ID=<?php echo $each['producer_ID'] ?>" class="hover">
						 				<?php echo $each['name']; ?>
						 			</a>
							 	</h2>
							</div>
							<div class="price">
							 	$<?php echo $each['price']; ?>
						 	</div>
						 	<div class="add_to_cart">
						 		<a href="../other_pages/add_to_cart.php?ID=<?php echo $each['ID'] ?>" class="hover">
							 		<i class="fas fa-shopping-cart" style="font-size: 20px"></i> Add to Cart
						 		</a>
						 	</div>
						</div>
					<?php }
				} ?>		
			</div>
		</div>
	</div>
</body>
</html>