<?php

$product_ID = $_GET['ID'];
// print_r($product_ID);

session_start();

if (isset($_SESSION['cart'][$product_ID])) {
	$_SESSION['cart'][$product_ID]++;
}
else {
	$_SESSION['cart'][$product_ID] = 1;
}

header('location: ../index.php');