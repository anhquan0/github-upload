<?php
	$name_producer = $_POST['producer'];
	include('../connect.php');
	$sql = "insert into producer(name) values('$name_producer')";
	mysqli_query($connect, $sql);
	include('../disconnect.php');
	header('location:producer_view.php');