<?php
session_start();
?>
<!-- Add "Continue shopping" -->

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../front_page/main_div.css">
	<style type="text/css">
		#middle_cart {
			width: 90%;
			height: 1000px;
			margin: auto;
			/*background: green;*/
		}
		#middle_cart > #links {
			width: 100%;
			padding-top: 10px;
			padding-bottom: 10px;
			font-size: 125%;
		}
		#middle_cart > #cart_empty {
			width: 100%;
			/*padding: 10%;*/
			margin-left: auto;
			margin-right: auto;
		}
		#middle_cart > #products_details {
			width: 60%;
			height: 70%;
			float: left;
			padding-top: 3%;
		}
		.each_product {
			width: 100%;
			height: 120px;
			background: #ebebed;
			font-size: 20px;
			padding-top: 20px;
			padding-bottom: 10px;
			border-bottom: 1px solid #bdbebf;
		}
		.each_product > .each_product_inner {
			width: 100%;
			height: 75%;
		}
		.each_product_inner > .each_product_photo {
			width: 15%;
			height: 100%;
			float: left;
			padding-right: 5px;
			margin: auto;
		}
		.each_product_inner > .each_product_info {
			width: 80%;
			height: 100%;
			float: left;
		}
		.each_product_info > .each_product_title {
			width: 100%;
			height: 30%;
		}
		.each_product_info > .each_product_amount {
			width: 100%;
			height: 40%;
		}
		.each_product_amount > .each_product_amount_change {
			float: left;
		}
		.each_product_amount > .each_product_amount_number {
			width: 50px;
			float: left;
			text-align: center;
		}
		.each_product_info > .each_product_single_price {
			width: 100%;
			height: 30%;
		}
		.each_product_inner > .remove_product {
			/*position: absolute;*/
			right: 0;
			z-index: 99;
		}

		.each_product > .each_product_total_price {
			width: 100%;
			height: 25%;
			/*margin-top: 1%;*/
			margin-bottom: 2%;
		}
		.each_product_total_price > .each_product_total_price_text {
			width: 46%;
			height: 100%;
			float: left;
			padding-left: 4%;
			font-weight: bold;
		}
		.each_product_total_price > .each_product_total_price_number {
			width: 48%;
			height: 100%;
			float: left;
			padding-right: 2%;
			text-align: right;
			font-weight: bold;
			color: #f20f22;
		}
		.detailed_product_photo {
			width: 40%;
			display: block;
			margin-left: auto;
			margin-right: auto;
		}

		#middle_cart > #order_info {
			width: 40%;
			height: 200px;
			float: left;
			/*background: blue;*/
			position: -webkit-sticky;
			position: sticky;
			top: 20%;
			padding-top: 3%;
		}
		#order_info > #order_info_inner {
			width: 50%;
			height: 90%;
			margin: auto;
			padding: 2%;
			background: #ebebed;
			border: 1px solid #bdbebf;
		}
		#order_info_inner > #order_info_text {
			width: 100%;
			/*height: 20%;*/
			text-align: center;
			padding: 5% 0;
			margin: 0;
			border-bottom: 1px solid #bdbebf;
		}
		#order_info_inner > #order_info_total {
			width: 100%;
			height: 20%;
			padding: 5% 0;
			font-size: 20px;
		}
		#order_info_inner > #order_info_total > #order_info_total_number {
			float: right;
		}
		#order_info_inner > #go_to_check_out {
			width: 100%;
			/*height: 20%;*/
			text-align: center;
			/*padding: 5% 0;*/
			font-size: 20px;
			/*border: 1px solid;*/
			background: #f20f22;
		}
		a {
			font-weight: bold;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="../front_page/overall_style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>
<div class="overall">
	<?php include('../front_page/header.php') ?>
	
	<div id="middle_cart">
		<div id="links">
			<a href="../index.php">Home</a>
			/
			Shopping Cart
		</div>
		<?php
		$image_folder = '../admin/product_images/';
		include'../admin/connect.php';

		$total = 0;

		if (empty($_SESSION['cart'])) { ?>
			<div id="cart_empty">
				<h3>It's all empty hereeee</h3>
			</div>
		<?php }
		else { ?>
			<div id="products_details">
				<?php foreach ($_SESSION['cart'] as $product_ID => $amount) { ?>
					<div class="each_product">
						<?php
							$sql = "select * from products where ID = '$product_ID'";
							$result = mysqli_query($connect,$sql);
							$each = mysqli_fetch_array($result);
						?>
						<div class="each_product_inner">
							<div class="each_product_photo">
								<img class="detailed_product_photo" src="<?php echo $image_folder . $each['photo'] ?>">
							</div>
							<div class="each_product_info">
								<div class="each_product_title">
									<a class="hover" href="../detailed_pages/detailed_product.php?ID=<?php echo $each['ID'] ?>&&producer_ID=<?php echo $each['producer_ID'] ?>">
										<?php echo $each['name']; ?>
									</a>
								</div>
								<div class="each_product_amount">
									<span class="each_product_amount_change">
										<a href="change_product_amount.php?ID=<?php echo $product_ID ?>&&type=subtract" class="hover">-</a>
									</span>
									<div class="each_product_amount_number">
										<?php echo $amount; ?>
									</div>
									<span class="each_product_amount_change">
										<a href="change_product_amount.php?ID=<?php echo $product_ID ?>&&type=add" class="hover">+</a>
									</span>
								</div>
								<div class="each_product_single_price">
									$<?php echo $each['price']; ?>
								</div>
							</div>
							<div class="remove_product">
								<a href="remove_product.php?ID=<?php echo $each['ID'] ?>" class="hover">
									<i class="fas fa-trash"></i>
								</a>
							</div>
						</div>
						<div class="each_product_total_price">
							<div class="each_product_total_price_text">
								Total:
							</div>
							<div class="each_product_total_price_number">
								$<?php echo $each['price'] * $amount; ?>
								<?php $total += $each['price'] * $amount; ?>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
			<div id="order_info">
				<div id="order_info_inner">
					<h2 id="order_info_text">Order info:</h2>
					<div id="order_info_total">
						Total:
						<span id="order_info_total_number">
							<?php echo "$total"; ?>
						</span>
					</div>
					<div id="go_to_check_out">
						<a href="check_out.php">
							<div style="padding: 5% 0;">
								Continue to checkout
							</div>
						</a>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>

	<?php include('../front_page/footer.php') ?>
</div>
</body>
</html>