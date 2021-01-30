<?php 
include('../connect.php');
$name = $_GET['name'];
if(isset($_GET['ID'])){
	$ID = $_GET['ID'];
	$sql = "select * from category where name = '$name' and ID != '$ID'";
	$result = mysqli_num_rows(mysqli_query($connect,$sql));
}
else {
	$sql = "select * from category where name = '$name'";
	$result = mysqli_num_rows(mysqli_query($connect,$sql));
}
include('../disconnect.php');
echo $result;
