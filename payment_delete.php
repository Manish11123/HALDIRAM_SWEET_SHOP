<?php
    include 'config.php';
	
    $Id = $_GET['Id'];
	mysqli_query($link, "DELETE FROM `order` WHERE Id= $Id");
	 header('location:payment_view.php');
	 
	
	 

?>