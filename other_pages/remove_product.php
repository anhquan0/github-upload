<?php 

$product_ID = $_GET['ID'];

session_start();

unset($_SESSION['cart'][$product_ID]);

// print_r($_SESSION);
header('location: cart_view.php');