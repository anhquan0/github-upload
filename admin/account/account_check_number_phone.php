<?php 
include('../connect.php');

$number_phone = $_GET['number_phone'];
if(isset($_GET['ID'])){
	$ID = $_GET['ID'];
	$sql = "select * from  account where number_phone = '$number_phone' and ID != '$ID'";
	$result = mysqli_num_rows(mysqli_query($connect,$sql));
}
else {
	$sql = "select * from  account where number_phone = '$number_phone'";
	$result = mysqli_num_rows(mysqli_query($connect,$sql));
}
$result = ($number_phone == '')? 0: $result;
echo $result;

include('../disconnect.php');