<?php 
	$ID = $_GET['ID'];
	include("../connect.php");
	$sql = "update bill set status = 2 where ID = '$ID'";
	mysqli_query( $connect, $sql);
	include("../disconnect.php");
	header("location:../bill_management");