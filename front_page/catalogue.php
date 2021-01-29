<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.middle > .middle_inner > #menu_detailed {
			width: 15%;
			height: 200px;
			float: left;
			background: #f20f22;
			text-align: center;
			position: -webkit-sticky;
			position: sticky;
			top: 12%;
			z-index: 20;
		}
		.logo {
			width: 10%;
		}
		#catalogue {
			width: 100%;
			/*background: green;*/
			padding: 0;
			margin: auto;
			/*margin-left: -19%;*/
			/*position: fixed;*/
		}
		#catalogue > li {
			text-align: center;
			position: relative;
			font-weight: bold;
			border-bottom: 1px solid;
			padding: 15px;
			background: white;
		}
		#catalogue > li > ul {
			width: 100%;
			display: none;
			position: absolute;
			top: 0;
			left: 100%;
			padding: 0;
		}
		#catalogue > li > ul > li {
			position: relative;
			border-bottom: solid;
			padding: 15px;
		}
		#catalogue > li:hover > ul {
			display: block;
			background: #f20f22;
			z-index: 99;
		}
		#catalogue > li:hover {
			background: #33b3de;
		}
		#catalogue > li > ul > li > ul {
			width: 100%;
			display: none;
			position: absolute;
			top: 0;
			left: 100%;
			padding: 0;
		}
		#catalogue > li > ul > li > ul > li {
			border-bottom: solid;
			border-right: solid;
			padding: 15px;
		}
		#catalogue > li > ul > li:hover > ul {
			display: block;
			background: #f20f22;
			z-index: 199;
		}
		#catalogue > li > ul > li:hover {
			background: #33b3de;
		}
		#catalogue > li > ul > li > ul > li:hover {
			background: #33b3de;
		}
	</style>

</head>
<body>
<div id="menu_detailed">
	<h3>CATALOGUE</h3>
	<ul id="catalogue">
		<li>
			<a href="../detailed_pages/index.php?producer_ID=1">
				<img src="../images_website/nintendo_logo.png" class="logo">
				Nintendo
				<i class="fas fa-caret-square-right" style="font-size: 10px;"></i>
			</a>
			<?php include'../admin/connect.php' ?>
			<ul>
				<li>
					<!-- <input type="hidden" name="id_nintendo"> -->
					<a href="">Nintendo Switch</a>
					<i class="fas fa-caret-square-right" style="font-size: 10px;"></i>
					<ul>
						<li>
							<a href="">The Switch</a>
						</li>
						<li>
							<a href="">The Switch Lite</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="">Switch games</a>
				</li>
				<li>
					<a href="">3DS</a>
					<i class="fas fa-caret-square-right" style="font-size: 10px;"></i>
					<ul>
						<li>
							<a href="">The consoles</a>
						</li>
						<li>
							<a href="">The games</a>
						</li>
					</ul>
				</li>
			</ul>
		</li>
		<li>
			<a href="../detailed_pages/index.php?producer_ID=2">
				<img src="../images_website/playstation_logo.png" class="logo">
				Play Station
				<i class="fas fa-caret-square-right" style="font-size: 10px;"></i>
			</a>
			<ul>
				<li>
					<a href="">The consoles</a>
					<i class="fas fa-caret-square-right" style="font-size: 10px;"></i>
					<ul>
						<li>
							<a href="">PS5</a>
						</li>
						<li>
							<a href="">PS4</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="">The games</a>
					<i class="fas fa-caret-square-right" style="font-size: 10px;"></i>
					<ul>
						<li>
							<a href="">PS5</a>
						</li>
						<li>
							<a href="">PS4</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="">Others</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="../detailed_pages/index.php?producer_ID=3">
				<img src="../images_website/xbox_logo.png" class="logo">
				XBox
				<i class="fas fa-caret-square-right" style="font-size: 10px;"></i>
			</a>
			<ul>
				<li>
					<a href="">The consoles</a>
					<i class="fas fa-caret-square-right" style="font-size: 10px;"></i>
					<ul>
						<li>
							<a href="">XBox SERIES X</a>
						</li>
						<li>
							<a href="">XBox ONE</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="">The games</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="">Others</a>
		</li>
	</ul>
</div>
</body>
</html>