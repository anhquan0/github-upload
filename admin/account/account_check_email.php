<?php 
include('../connect.php');

$email = $_GET['email'];
if(isset($_GET['ID'])){
	$ID = $_GET['ID'];
	$sql = "select * from  account where email = '$email' and ID != '$ID'";
	$result = mysqli_num_rows(mysqli_query($connect,$sql));
}
else {
	$sql = "select * from  account where email = '$email'";
	$result = mysqli_num_rows(mysqli_query($connect,$sql));
}
$result = ($email == '')? 0: $result;
echo $result;

include('../disconnect.php');