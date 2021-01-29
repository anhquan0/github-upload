<?php 
	// session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="main_div.css">
	<style type="text/css">
		#top > #top_upper {
			width: 80%;
			height: 50px;
			margin: auto;
			/*color: white;*/
			/*background: yellow;*/
		}
		#top > #top_upper > #top_upper_left {
			width: 60%;
			float: left;
		}
		#top > #top_upper > #top_upper_left > #logo {
			width: 30%;
			float: left;
			margin: auto;
			display: block;
			text-align: center;
		}
		#top > #top_upper > #top_upper_left > #search_bar {
			width: 70%;
			float: left;
			display: inline-block;
			text-align: center;
			margin-left: auto;
			margin-right: auto;
			padding-top: 10px;
		}
		
		#top > #top_upper > #top_upper_right {
			width: 40%;
			float: left;
		}
		#top > #top_upper > #top_upper_right > #account {
			width: 70%;
			float: left;
			margin: auto;
			text-align: right;
			padding-top: 10px;
		}
		#top > #top_upper > #top_upper_right > #cart {
			width: 30%;
			float: left;
			margin: auto;
			text-align: right;
		}

		#top > #top_lower {
			width: 100%;
			height: 44px;
			margin: auto;
			background: #f20f22;
			/*position: fixed;*/
		}
		#top > #top_lower > #top_lower_inner {
			width: 80%;
			height: inherit;
			margin: auto;
			text-align: right;
		}
		#menu_overall {
			width: 85%;
			float: left;
			/*background: pink;*/
			margin-top: 0px;
			margin-bottom: 0px;
			margin-left: 15%;
		}
		#menu_overall > li {
			float: left;
			width: 20%;
			height: inherit;
			position: relative;
			text-align: center;
			font-weight: bold;
			border-right: 1px solid;
			/*background: #e81344;*/
			padding: 10px;
		}
		#menu_overall > li > ul {
			display: none;
			position: absolute;
			width: 250px;
			top: 39px;
			left: -15%;
			text-align: center;
			font-weight: normal;
			padding: 5px;
		}
		#menu_overall > li > ul > li {
			background: #f20f22;
			border-bottom: 1px solid;
			padding: 5px;
		}
		#menu_overall > li:hover > ul {
			display: block;
			z-index: 99;
		}
		#menu_overall > li:hover {
			display: block;
			background: #33b3de;
		}
		#menu_overall > li > ul > li:hover {
			background: #33b3de;
		}
	</style>
</head>
<body>
<div id="top">
	<div id="top_upper">
		<div id="top_upper_left">
			<div id="logo">
				<a href="../index.php"> 
					<img src="../images_website/website_logo.png" width="75px" alt="logo here">
				</a>
			</div>
			<div id="search_bar">
				<form>
					<input type="search" name="search" placeholder="Search..." size="30">
					<button><i class="fas fa-search"></i></button>
				</form>
			</div>
		</div>
		<div id="top_upper_right">
			<div id="account">
				<?php 
					if (isset($_SESSION['username'])) {
						if (!isset($_SESSION['level'])) {
							echo "";
						}
						else { ?>
							<a href="../admin/category" class="hover">Admin</a>
						<?php }
						echo "Hello ". $_SESSION['username']; ?>
						/
						<a href="../admin/sign_out_process.php" class="hover">Sign out</a>
					<?php } 
					else { ?>
						<a href="sign_in.php" class="hover">Sign in</a>
						/
						<a href="register.php" class="hover">Register</a>
				<?php } ?>
			</div>
			<div id="cart">
				<a href="../other_pages/cart_view.php" class="hover">
					<i class="fas fa-shopping-cart" style="font-size: 40px"></i>
		 		</a>
			</div>
		</div>
		</div>
	<div id="top_lower">
		<?php 
			include_once '../admin/connect.php';

			$sql = "select * from producers";
			$result_producers = mysqli_query($connect,$sql);
		?>
		<div id="top_lower_inner">
			<ul id="menu_overall">
				<li>
					<a href="../index.php">
						<!-- <img src="../images_website/website_logo.png" width="30px" alt="Home page"> -->
						Home page
					</a>
				</li>
				<?php foreach ($result_producers as $each_producers) { ?>
					<li>
						<a href="../detailed_pages/index.php?producer_ID=<?php echo $each_producers['ID'] ?>">
							<?php echo $each_producers['name']; ?>
						</a>
						<ul>
							<li>
								<a href="">Consoles</a>
							</li>
						<li>
								<a href="">Games</a>
							</li>
							<li>
								<a href="">Others</a>
							</li>
						</ul>
					</li>
				<?php } ?>
				<!-- the old header prompt -->
				
				<!-- <li>
					<a href="view_products_by_producers.php?producer_ID=<?php echo $each_producers['ID'] ?>">Nintendo</a>
					<ul>
						<li>
							<a href="">Nintendo Switch</a>
						</li>
						<li>
							<a href="">Switch games</a>
						</li>
						<li>
							<a href="">3DS</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="view_products_by_producers.php?producer_ID=<?php echo $each_producers['ID'] ?>">Play Station</a>
					<ul>
						<li>
							<a href="">Consoles</a>
						</li>
					<li>
							<a href="">Games</a>
						</li>
						<li>
							<a href="">Others</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="view_products_by_producers.php?producer_ID=<?php echo $each_producers['ID'] ?>">XBox</a>
					<ul>
						<li>
							<a href="">Consoles</a>
						</li>
						<li>
						<a href="">Games</a>
						</li>
					</ul>
				</li> -->

				<!-- <li>
					<a href="../other_pages/news.php">News</a>
				</li> -->
			</ul>
		</div>
	</div>
</div>
</body>
</html>