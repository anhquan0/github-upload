<?php 
include('../connect.php');

$username = $_GET['username'];
if(isset($_GET['ID'])){
	$ID = $_GET['ID'];
	$sql = "select * from account where username = '$username' and ID != '$ID'";
	$result = mysqli_num_rows(mysqli_query($connect,$sql));
}
else {
	$sql = "select * from account where username = '$username'";
	$result = mysqli_num_rows(mysqli_query($connect,$sql));
}
$result = ($username == '')? 0: $result;
echo $result;
include('../disconnect.php');


