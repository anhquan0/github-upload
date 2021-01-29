<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="main_div.css">
	<style type="text/css">
		.middle > .middle_inner > .content_main > #hot_item {
			width: 100%;
		}
		.games_list {
			width: 100%;
			height: 550px;
		}
		.games_overview {
			width: 20%;
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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>
<div class="middle">
		<div class="middle_inner">
			<?php include('catalogue.php') ?>
			<div class="content_main">
				<?php include ('banner.php') ?>
				<!-- <div id="hot_items">
					
				</div> -->
				
				<?php 
					$image_folder = '../admin/product_images/';
					include'../admin/connect.php';
				?>

				<?php
					if(isset($_GET['search'])) {
						$search = $_GET['search'];
						$sql = "select * from products where name like '%$search%'";
						
						$result = mysqli_query($connect, $sql);
						$total_product = mysqli_num_rows($result);
						$amount_product_page = 3;
						$total_page = ceil($total_product / $amount_product_page);
						if(isset($_GET['page'])) {
							$page = $_GET['page'];	
						}
						else $page = 1;

						//$amount_account_page = ($total_account < $amount_account_page)? $total_page: $amount_account_page;
						$skip = ($page - 1)* $amount_product_page;
						$sql = "$sql limit $amount_product_page offset $skip";
						// $sql = "$sql where products.name like '%$search%'";

						$result = mysqli_query($connect, $sql);

						?>
						<h1>
							Total: <?php echo $total_product ?>
						</h1>
						<?php for($i = 1; $i <= $total_page; $i++) { ?>
							<a href="?page=<?php echo $i ?>&&search=<?php echo $search ?>" class="hover"><?php echo $i ?></a>
						<?php }
						// show searched products
						foreach ($result as $each) { ?>
						<div class="games_overview" id="nintendo_games">
						 	<div class="photo" style="background-image: url('<?php echo $image_folder.$each['photo'] ?>');">
						 	</div>
						 	<div class="title">
						 		<h2>
						 			<a href="../detailed_pages/detailed_product.php?ID=<?php echo $each['ID'] ?>&&producer_ID=<?php echo $each['producer_ID'] ?>" class="hover">
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
					}

				elseif (isset($_GET['producer_ID'])) {
					$producer_ID = $_GET['producer_ID'];
					$sql = "select * from products where producer_ID = '$producer_ID'";
				$result_products = mysqli_query($connect,$sql);
				foreach ($result_products as $each_products) { ?>
						<div class="games_overview" id="nintendo_games">
						 	<div class="photo" style="background-image: url('<?php echo $image_folder.$each_products['photo'] ?>');">
						 	</div>
						 	<div class="title">
						 		<h2>
						 			<a href="../detailed_pages/detailed_product.php?ID=<?php echo $each_products['ID'] ?>&&producer_ID=<?php echo $each_products['producer_ID'] ?>" class="hover">
						 				<?php echo $each_products['name']; ?>
						 			</a>
							 	</h2>
							</div>
							<div class="price">
							 	$<?php echo $each_products['price']; ?>
						 	</div>
						 	<div class="add_to_cart">
						 		<a href="../other_pages/add_to_cart.php?ID=<?php echo $each_products['ID'] ?>" class="hover">
							 		<i class="fas fa-shopping-cart" style="font-size: 20px"></i> Add to Cart
						 		</a>
						 	</div>
						</div>
					<?php }
				}
				else { ?>
					<h1>Nintendo games</h1>
					<div class="content_main_general">
						<div class="games_list">
								
							<?php 
								$sql = "select * from products where producer_ID = '1' limit 4";
								$result_products = mysqli_query($connect,$sql);
							?>
							<?php foreach ($result_products as $each_products) { ?>

								<div class="games_overview" id="nintendo_games">
								 	<div class="photo" style="background-image: url('<?php echo $image_folder.$each_products['photo'] ?>');"></div>
								 	<div class="title">
								 		<h2>
								 			<a href="../detailed_pages/detailed_product.php?ID=<?php echo $each_products['ID'] ?>&&producer_ID=<?php echo $each_products['producer_ID'] ?>" class="hover">
								 				<?php echo $each_products['name']; ?>
								 			</a>
									 	</h2>
									</div>
									<div class="price">
									 	$<?php echo $each_products['price']; ?>
								 	</div>
								 	<div class="add_to_cart">
								 		<a href="../other_pages/add_to_cart.php?ID=<?php echo $each_products['ID'] ?>" class="hover">
									 		<i class="fas fa-shopping-cart" style="font-size: 20px"></i> Add to Cart
								 		</a>
								 	</div>
								</div>
							<?php } ?>
						</div>

						<h1>Play Station games</h1>
						<div class="games_list">
								
							<?php 
								$sql = "select * from products where producer_ID = '2' limit 4";
								$result_products = mysqli_query($connect,$sql);
							?>
							<?php foreach ($result_products as $each_products) { ?>

								<div class="games_overview" id="nintendo_games">
								 	<div class="photo" style="background-image: url('<?php echo $image_folder.$each_products['photo'] ?>');"></div>
								 	<div class="title">
								 		<h2>
								 			<a href="../detailed_pages/detailed_product.php?ID=<?php echo $each_products['ID'] ?>&&producer_ID=<?php echo $each_products['producer_ID'] ?>" class="hover">
								 				<?php echo $each_products['name']; ?>
								 			</a>
									 	</h2>
									</div>
									<div class="price">
									 	$<?php echo $each_products['price']; ?>
								 	</div>
								 	<div class="add_to_cart">
								 		<a href="../other_pages/add_to_cart.php?ID=<?php echo $each_products['ID'] ?>" class="hover">
									 		<i class="fas fa-shopping-cart" style="font-size: 20px"></i> Add to Cart
								 		</a>
								 	</div>
								</div>
							<?php } ?>
						</div>

						<h1>XBox games</h1>
						<div class="games_list">
								
							<?php 
								$sql = "select * from products where producer_ID = '3' limit 4";
								$result_products = mysqli_query($connect,$sql);
							?>
							<?php foreach ($result_products as $each_products) { ?>

								<div class="games_overview" id="nintendo_games">
								 	<div class="photo" style="background-image: url('<?php echo $image_folder.$each_products['photo'] ?>');"></div>
								 	<div class="title">
								 		<h2>
								 			<a href="../detailed_pages/detailed_product.php?ID=<?php echo $each_products['ID']?>&&producer_ID=<?php echo $each_products['producer_ID'] ?>" class="hover">
								 				<?php echo $each_products['name']; ?>
								 			</a>
									 	</h2>
									</div>
									<div class="price">
									 	$<?php echo $each_products['price']; ?>
								 	</div>
								 	<div class="add_to_cart">
								 		<a href="../other_pages/add_to_cart.php?ID=<?php echo $each_products['ID'] ?>" class="hover">
									 		<i class="fas fa-shopping-cart" style="font-size: 20px"></i> Add to Cart
								 		</a>
								 	</div>
								</div>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
				
			</div>
		</div>
	</div>
</body>
</html>