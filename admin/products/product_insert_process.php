<?php 
	$name = $_POST['name'];
	$photo = $_FILES['photo'];
	$photo_folder = "../product_images/";
	$photo_name = $photo['name'];
	$photo_link = $photo_folder.$photo_name;
	move_uploaded_file($photo['tmp_name'], $photo_link);
	$release_date = $_POST['release_date'];
	$price = $_POST['price'];
	$description = $_POST['description'];
	$producer_ID = $_POST['producer_ID'];
	$category_ID = $_POST['category_ID'];
	//;update producers set status = status + 1 where id = producers.'$producer_id'
	include('../connect.php');

	$sql1 = "update categories set status = status + 1 where categories.ID = '$category_ID'";
	mysqli_query($connect, $sql1);
	$sql2 = "update producers set status = status + 1 where producers.ID = '$producer_ID'";
	mysqli_query($connect, $sql2);
	
	$sql = "insert into products(name, photo, release_date, price, description, producer_ID, category_ID) values ('$name', '$photo_name', '$release_date', '$price', '$description', '$producer_ID', '$category_ID')";
	mysqli_query($connect, $sql);

	header('location:index.php');