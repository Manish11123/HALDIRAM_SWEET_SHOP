<?php
session_start();
//$_SESSION['user']=$row['user_id'];
		
	include 'config.php';
	//$Id = $_GET['id'];
//	$_SESSION['cart']=$row['id'];
// $id = $_SESSION['cart'];
			   mysqli_query($link , "DELETE FROM `cart` WHERE Id=$id" );
	
	?>