<?php 
	session_start();
	if(!isset($_SESSION['username'])) {
		header('location:../admin/index.php');
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../front_page/overall_style.css">
	<style type="text/css">
		#check_out {
			width: 100%;
			/*height: 100%;*/
			margin: auto;
		}
		#check_out > #check_out_left {
			padding-top: 1%;
			width: 30%;
			/*height: 100%;*/
			float: left;
			padding-left: 10%;
		}
		#check_out_left > #general_info {
			width: 100%;
			padding-bottom: 2%;
		}
		#check_out_left > #receiver_info {
			width: 100%;
		}
		#check_out_left > #receiver_info > #receiver_form {
			width: 100%;
		}
		.receive_form_input {
			width: 100%;
			padding: 10px;
		}
		#receieve_form_button {
			width: 100%;
			padding: 10px;
		}
		#receive_form_button > #return_to_cart_button {
			width: 70%;
			float: left;
			padding-top: 15px;
		}

		#check_out > #check_out_right {
			padding-top: 1%;
			width: 30%;
			/*height: 100%;*/
			float: right;
			background: #ebebed;
			padding-left: 10%;
			padding-right: 10%;
			border-left: 1px solid #bdbebf;
		}
		#check_out_right > #order_text {
			border-bottom: 1px solid #bdbebf;
		}
		#check_out_right > #product_info {
			width: 100%;
			height: 100%;
		}
		.product_info > .product_info_inner {
			width: 100%;
			height: 80px;
			padding: 10px;
			border-bottom: 1px solid #bdbebf;
		}
		.product_info_inner > .product_info_photo {
			width: 20%;
			height: 100%;
			float: left;
			padding-right: 5px;
			margin: auto;
		}
		.detailed_product_info_photo {
			width: 50%;
			display: block;
			margin-left: auto;
			margin-right: auto;
		}
		.product_info_inner > .product_info_title {
			width: 50%;
			height: 100%;
			float: left;
			font-size: 18px;
		}
		.product_info_inner > .product_info_total_price_number {
			width: 20%;
			height: 100%;
			float: left;
			padding-right: 2%;
			text-align: right;
			font-weight: bold;
			color: #f20f22;
			float: left;
			margin: auto;
		}

		#check_out_right > #discount_coupon {

		}
		#check_out_right > #product_and_shipping_prices {

		}
		#check_out_right > #check_out_total_price {
			width: 100%;
			padding: 20px;
		}
		#check_out_total_price > #check_out_total_number {
			width: 40%;
			float: right;
			text-align: right;
			padding-right: 50px;
		}

		.hover:hover {
			color: #f20f22;
		}
		input {
			margin: 0;
			padding: 10px 15px;
			box-shadow: 1px #bdbebf;
			width: 100%;
		}
		textarea {
			width: 100%;
		}
		button {
			padding: 15px 25px;
			float: right;
			background: #f20f22;
			border: 0;
		}
		button:hover {
			
			color: white;
		}
	</style>
</head>
<body>
<div class="overall">
	<div id="check_out">
		<div id="check_out_left">
			<div id="general_info">
				<h1>Game Shop</h1>
				<a href="cart_view.php" class="hover">Cart</a>
				/
				Order Info
			</div>
			<div id="receiver_info">
				<h2>Order Info</h2>
				<div id="receiver_form">
					<form action="check_out_process.php" method="post">
						<div class="receive_form_input">
							Name:
							<br>
							<input type="text" name="receiver_name">
						</div>
						<!-- <div class="recieve_form_input">
							Email:
							<br> 
							<input type="email" name="reciever_email" size="40">
						</div> -->
						<div class="receive_form_input">
							Phone number:
							<br> 
							<input type="number" name="receiver_number_phone">
						</div>
						<div class="receive_form_input">
							Address:
							<br> 
							<input type="text" name="receiver_address">
						</div>
						<div class="receive_form_input">
							Note:
							<br> 
							<textarea name="receiver_notes" rows="10"></textarea>
						</div>
						<div id="receive_form_button">
							<div id="return_to_cart_button">
								<a class="hover" href="cart_view.php">< Return to Cart</a>
							</div>
							<button>Order</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div id="check_out_right">
			<div id="order_text">
				<h2>Order</h2>
			</div>

			<?php
			$image_folder = '../admin/product_images/';
			include'../admin/connect.php';

			$total = 0;
			
			foreach ($_SESSION['cart'] as $product_ID => $amount) { ?>
				<div class="product_info">
					<?php
						$sql = "select * from products where ID = '$product_ID'";
						$result = mysqli_query($connect,$sql);
						$each = mysqli_fetch_array($result);
					?>
					<div class="product_info_inner">
						<div class="product_info_photo">
							<img class="detailed_product_info_photo" src="<?php echo $image_folder . $each['photo'] ?>">
						</div>
						<div class="product_info_title">
							<?php echo $each['name']; ?>
						</div>
						<!-- <div class="product_info_amount">
							<?php echo $amount; ?>
						</div> -->
						<div class="product_info_total_price">
							$<?php echo $each['price'] * $amount; ?>
							<?php $total += $each['price'] * $amount; ?>
						</div>
					</div>
				</div>
			<?php } ?>
			<div id="discount_coupon">
				
			</div>
			<div id="product_and_shipping_prices">
				
			</div>
			<div id="check_out_total_price">
				Total:
				<span id="check_out_total_number">
					<?php echo "$total"; ?>
				</span>
			</div>
		</div>
	</div>
</div>
</body>
</html>