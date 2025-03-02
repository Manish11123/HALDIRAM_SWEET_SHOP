<?php
    include 'config.php';
	
    $Id = $_GET['Id'];
	mysqli_query($link, "DELETE FROM `cart` WHERE id= $Id ");
	 header('location:viewcart.php');
	 
?>