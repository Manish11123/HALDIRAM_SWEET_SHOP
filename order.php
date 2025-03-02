<?php
 
 include 'config.php';
 
 
 if(isset($_GET['user_id'])) {
	 $user_id = $_GET['user_id'];
 }
 
 $total_price = 0;
 //$cart_query_price = " select * from cart where product_name";
 $result_cart_price = mysqli_query($link , $cart_query_price);
 



?>