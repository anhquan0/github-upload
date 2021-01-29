<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="main_div.css">
	<style type="text/css">
		.content_main > #product_image {
			position: -webkit-sticky;
			position: sticky;
			top: 0;
			width: 50%;
			float: left;
		}
		.detailed_product_photo {
			width: 70%;
			display: block;
			margin-left: auto;
			margin-right: auto;
		}
		.content_main > #product_info {
			width: 50%;
			float: left;
		}
		.content_main > #product_info > #product_name {

		}
		.content_main > #product_info > #product_price {
			color: #f20f22;
			font-size: 150%;
		}
		.content_main > #product_info > #product_cart {
			width: 100%;
			height: 10%;
			text-align: center;
			font-size: 20px;
			border: solid;
			border-color: #f20f22;
			/*padding: 15px;*/
			margin: 50px 0;
		}
		#product_cart:hover {
			color: white;
			background: #f20f22;
		}
		.middle > .middle_inner > #related_products {
			width: 100%;
		}
		#related_products > .related_products_overview {
			width: 19%;
			height: 500px;
			float: left;
			border-style: solid;
			margin: 2% 2.5% 2%;
			background: white;
		}
		.related_products_overview > .photo {
			height: 60%;
			width: 100%;
			background-position: center center;
			background-size: cover;
		}
		.related_products_overview > .title {
			width: 100%;
			height: 15%;
			text-align: center;
		}
		.related_products_overview > .price {
			width: 100%;
			height: 10%;
			text-align: center;
			color: #f20f22;
			font-weight: bold;
			margin: 0;
		}
		.related_products_overview > .add_to_cart {
			width: 100%;
			height: 10%;
			text-align: center;
			border-top: solid;
			padding-top: 15px;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="../front_page/overall_style.css">
</head>
<body>
<div class="overall">
	<?php include('../front_page/header.php') ?>
	<div class="middle">
		<div class="middle_inner">
			<?php 
				$image_folder = '../admin/product_images/';
				include'../admin/connect.php';
			?>
			<div class="content_main">
				<?php
					$ID = $_GET['ID'];
					$sql = "select products.*, producers.name as producer_name from products
							JOIN producers ON products.producer_ID = producers.ID
							where products.ID = '$ID'";
					$result = mysqli_query($connect,$sql);
					foreach ($result as $each) { ?>
						<div id="product_image">					
							<img class="detailed_product_photo" src="<?php echo $image_folder.$each['photo'] ?>">
						</div>
						<div id="product_info">
							<div id="product_name">
								<h1 style="font-size: 250%;">
									<?php echo $each['name']; ?>
								</h1>
								from <a href="index.php?producer_ID=1" class="hover"><?php echo $each['producer_name']; ?></a>
							</div>
							<div id="product_price">
								<h2>
									$<?php echo $each['price']; ?>
								</h2>								
							</div>
							<div id="product_cart">
								<a href="../other_pages/add_to_cart.php?ID=<?php echo $each['ID'] ?>">
									<div style="padding: 15px;">
										<i class="fas fa-shopping-cart" style="font-size: 20px"></i> Add to Cart
									</div>
						 		</a>
							</div>
							<div>
								<h3>Product info:</h3>
								<br>
								<?php echo $each['description']; ?>
							</div>
						</div>
					<?php } ?>
			</div>
			
			<div id="related_products">
				<?php 
					$producer_ID = $_GET['producer_ID'];
					$sql = "select * from products where producer_ID = '$producer_ID' limit 4";
					$result = mysqli_query($connect,$sql);
					foreach ($result as $each) { ?>
						<div class="related_products_overview">
							<div class="photo" style="background-image: url('<?php echo $image_folder.$each['photo'] ?>');"></div>
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
						 		<a href="" class="hover">
							 		<i class="fas fa-shopping-cart" style="font-size: 20px"></i> Add to Cart
						 		</a>
						 	</div>
						</div>
					<?php } ?>
			</div>
		</div>
	</div>
	<?php include('../front_page/footer.php') ?>
</div>
</body>
</html>