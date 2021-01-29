<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="main_div.css">
	<style type="text/css">
		#bottom > #bottom_upper {
			width: 80%;
			height: inherit; /*from above*/
			margin-left: 10%;
			margin-right: 10%;
			background: #f20f22;
		}
		#bottom > #bottom_upper > #bottom_upper_left {
			width: 30%;
			float: left;
		}
		#bottom > #bottom_upper > #bottom_upper_right {
			width: 70%;
			float: left;
		}
		#bottom > #bottom_upper > #bottom_upper_right > .footer_detailed {
			width: 30%;
			float: left;
		}
		/*#bottom > #bottom_lower {
			width: 100%;
			background: gray;
		}*/
		#bottom > #bottom_upper > #bottom_upper_right > .footer_detailed > .end_page {
			padding: 0;
			width: 200px;
			position: absolute;
		}
		#bottom > #bottom_upper > #bottom_upper_right > .footer_detailed > .end_page > li {
			height: 20px;
			position: relative;
			top: -40px;
		}
	</style>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>
<div id="bottom">
	<div id="bottom_upper">
		<div id="bottom_upper_left">
			<div>
				<h4>Join in the fun</h4>
				<div>
					<a href="">
						<i class="fab fa-facebook" style="font-size: 30px;"></i>
						<!-- <img src=""> Facebook icon -->
					</a>
					<a href="">
						<i class="fab fa-twitter" style="font-size: 30px;"></i>
						<!-- <img src=""> Twitter icon -->
					</a>
					<a href="">
						<i class="fab fa-instagram" style="font-size: 30px;"></i>
						<!-- <img src=""> Instagram icon -->
					</a>
				</div>
				<div>
					<b>
						Why buy from <!-- insert website name -->
					</b>
					<br>
					yadayadayadainsertsomethinghere
				</div>
				<div>
					<i class="fab fa-cc-visa" style="font-size: 40px;"></i>
					<i class="fab fa-cc-mastercard" style="font-size: 40px;"></i>
					<i class="fab fa-cc-paypal" style="font-size: 40px;"></i>
				</div>
			</div>
		</div>
		<div id="bottom_upper_right">
			<div class="footer_detailed">
				<h4>About us</h4>
				<br>
				<!-- insert info sbout the website here -->
			</div>
			<div class="footer_detailed">
				<h4>Terms & Policies</h4>
				<ul class="end_page">
						<li>
							<a href="">Term of Use</a>
						</li>
						<li>
							<a href="">Terms of Sale</a>
						</li>
						<li>
							<a href="">Returns Policy</a>
						</li>
						<li>
							<a href="">Privacy Policy</a>
						</li>
					</ul>
			</div>
			<div class="footer_detailed">
				<h4>Help & Support</h4>
				<ul class="end_page">
						<li>
							<a href="">Delivery & Payment</a>
						</li>
						<li>
							<a href="">Glossary</a>
						</li>
						<li>
							<a href="">Contact Us</a>
						</li>
					</ul>
			</div>
		</div>
</div>
<!-- <div id="bottom_lower">
	hdfdasgdas
	Address here
</div> -->
</div>
</body>
</html>