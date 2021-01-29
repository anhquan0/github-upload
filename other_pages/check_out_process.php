<?php 
	session_start();
	include("../admin/connect.php");
	$account_ID = $_SESSION['ID'];
	$receiver_name = $_POST['receiver_name'];
	$receiver_number = $_POST['receiver_number'];
	$receiver_address = $_POST['receiver_address'];
	$receiver_notes = $_POST['receiver_notes'];
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$date = date('Y:m:d H:m:s');
	$sql = "insert into bill(account_ID, receiver_name, receiver_address, receiver_number, receiver_notes, transaction_time) values('$account_ID','$receiver_number' ,'$receiver_name','$receiver_address','$receiver_notes','$date')";
	mysqli_query($connect, $sql);

	$sql = "select MAX(ID) from bill";
	$each1 = mysqli_fetch_array(mysqli_query($connect, $sql));
	$bill_ID = $each1['MAX(ID)'];
 	foreach ($_SESSION['cart'] as $product_ID => $amount) {
		$sql = "select * from products where ID = '$product_ID'";
		$result = mysqli_query($connect,$sql);
		$each = mysqli_fetch_array($result); 
		$price = $each['price'];		
		$sql1 = "insert into bill_detail(bill_ID, product_ID, amount, price) values('$bill_ID', '$product_ID', '$amount', '$price')";
		mysqli_query($connect, $sql1);
	}
	unset($_SESSION["cart"]);
	include("../admin/disconnect.php");

	header('location: ../index.php');

