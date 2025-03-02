<?php
    include 'config.php';
	
    $Id = $_GET['Id'];
	mysqli_query($link, "DELETE FROM `register_mast` WHERE user_id= $Id");
	 header('location:view.php');
	 
?>