<?php 

$ID = $_GET['ID'];
include('../connect.php');
$sql = "select * from  account where ID = '$ID'";
$result = mysqli_fetch_assoc(mysqli_query($connect,$sql));
include('../disconnect.php');


echo json_encode($result);
