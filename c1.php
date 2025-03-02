<?php
include 'config.php';

if(isset($_POST['submit'])) {
	$p_name = $_POST['PName'];
	$p_price = $_POST['PPrice'];
	//$p_image = $_POST[image];
	$p_qty = $_POST['PQuantity'];
	
	

$insert_product = mysqli_query($link,"INSERT INTO `cart`( `product_name`, `price`, `quantity`) 
			VALUES ('$p_name',$p_price,$p_qty)");
?>
 <h1> hello </h1>