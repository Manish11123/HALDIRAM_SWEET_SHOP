<?php
session_start();
    include 'config.php';
	
    $Id = $_GET['Id'];
	mysqli_query($link, "DELETE FROM cart WHERE Id <= NOW() - INTERVAL '120' SECOND");
	unset($_SESSION['cart']);
	//session_destroy();
	 header('location:menu_home.php');
	 
	 
	/*	if(isset($_POST['remove']))
		  {
			  $itname= $_POST['PName'];
			   foreach($_SESSION['cart'] as $key => $value)
			   {
				   if($value['productName'] === $itname) 
				   {
					   
					  mysqli_query($link , "DELETE * FROM `cart`" );
					  
					  unset($_SESSION['cart'] [$key] );
					  $_SESSION['cart'] = array_values($_SESSION['cart'] );
					   header('location:viewcart.php');
				   }
			   }
		   } */

?>