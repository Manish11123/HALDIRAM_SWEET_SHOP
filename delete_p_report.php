<?php
    include 'config.php';
	
    $Id = $_GET['Id'];
	mysqli_query($link, "DELETE FROM `dbitems` WHERE Id = $Id");
	 header('location:product_report.php');
	 
	
	 

?>