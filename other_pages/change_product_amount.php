<?php 

$product_ID = $_GET['ID'];
$type = $_GET['type'];

session_start();

if ($type == 'subtract') {
	if ($_SESSION['cart'][$product_ID] > 1) {
		$_SESSION['cart'][$product_ID]--;
	}
	else {
		$_SESSION['cart'][$product_ID] = 1;
	}
}
else {
	if ($_SESSION['cart'][$product_ID] > 10) {
		$_SESSION['cart'][$product_ID] = 10;
	}
	else {
		$_SESSION['cart'][$product_ID]++;
	}
}

// print_r($_SESSION);
header('location: cart_view.php');