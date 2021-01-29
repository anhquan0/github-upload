<div class="w3-sidebar w3-bar-block quan-menu" style="width:15%">
	<h3 class="w3-bar-item">Admin</h3>
	<a href="../bill_management" class="w3-bar-item w3-button ">Bill Management</a>
	<a href="../producers" class="w3-bar-item w3-button ">Producers</a>
	<a href="../products" class="w3-bar-item w3-button " >Products</a>
	<a href="../category" class="w3-bar-item w3-button " >Category</a>
	<?php if (isset($_SESSION['level'])): ?>
		<a href="../account" class="w3-bar-item w3-button " >Admin</a>
	<?php endif ?>
	<a href="../customer" class="w3-bar-item w3-button " >Customer</a>
	<a href="../sign_out_process.php" class="w3-bar-item w3-button" style="background-color: none ">Sign Out</a>
</div>
