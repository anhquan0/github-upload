<?php 
	include('../connect.php');
	//Take old photo 
	$ID = $_GET['ID'];
	$sql1 = "select photo from products where ID = '$ID'";
	$result = mysqli_query($connect, $sql1);
	$each = mysqli_fetch_array($result);
	//Insert new photo (if any)
	$name = $_POST['name'];
	$photo1 = $_FILES['photo1'];
	$photo1_folder = "../img/";
	//If you insert new photo 
	$photo1_link = $photo1_folder.$photo1_name;
    if($photo1['size'] != 0) {
        move_uploaded_file($photo1['tmp_name'], $photo1_link);
        $photo1_name = $photo1['name'];
    }
    else {
    	$photo1_name = $each['photo'];
    }
	
    // print_r($photo1_name);
	$release_date = $_POST['release_date'];
	$price = $_POST['price'];
	$description = $_POST['description'];
	$producer_ID = $_POST['producer_ID'];
	$category_ID = $_POST['category_ID'];

	$sql = "select category_ID, producer_ID from products where ID = '$ID'";
	$each = mysqli_fetch_array(mysqli_query($connect, $sql));
	$category_ID_old = $each['category_ID'];
	$producer_ID_old = $each['producer_ID'];
	if($category_ID_old != $category_ID) {
		$sql1 = "update category set status = status + 1 where category.ID = '$category_ID'";
		mysqli_query($connect, $sql1);
		$sql1 = "update category set status = status - 1 where category.ID = '$category_ID_old'";
		mysqli_query($connect, $sql1);		
	}

	if($producer_ID_old != $producer_ID) {
		$sql1 = "update producers set status = status + 1 where producers.ID = '$producer_ID'";
		mysqli_query($connect, $sql1);
		$sql1 = "update producers set status = status - 1 where producers.ID = '$producer_ID_old'";
		mysqli_query($connect, $sql1);		
	}
	
	$sql = "update products set name = '$name', release_date = '$release_date', price = '$price', description = '$description', producer_ID = '$producer_ID', category_ID = '$category_ID' where ID = '$ID'";
	mysqli_query($connect, $sql);
	include('../disconnect.php');
	header('location:index.php');