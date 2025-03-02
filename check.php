
<?php
  include "config.php" ;
  
  error_reporting(E_ERROR | E_PARSE);
  //$price_total ="";
  
  if(isset($_POST['order_btn'])) {
	  $name = $_POST['name'];
	  $number = $_POST['number'];
	  $email = $_POST['email'];
	  $method = $_POST['method'];
	  $address = $_POST['address'];
	  $city = $_POST['city'];
	  $pin_code = $_POST['pin_code'];
	  $state = $_POST['state'];
	  $date = date('y-m-d');
	  
	  $cart_query = mysqli_query($link, "select * from cart");
	  $price_total = 0;
	  
	  if(mysqli_num_rows($cart_query) > 0) {
		  while($product_item = mysqli_fetch_assoc($cart_query)) {
			  $product_name[] = $product_item['product_name'] .' ('. $product_item['quantity'] .' )' ;
			  $product_price = ($product_item['price'] * $product_item['quantity']);
			 $price_total +=  $product_price;
		  };
	  };
	  
	  $total_product = implode(', ',$product_name);
	  $total_price = $price_total; // Assuming $price_total holds the total price
	  $detail_query = mysqli_query($link, "INSERT INTO `order` (`name`, `number`, `email`, `method`, `address`, `city`, `pin_code`, `state`, `date`, `total_price`)
    VALUES ('$name', '$number', '$email', '$method', '$address', '$city', '$pin_code', '$state', '$date', '$total_price')")  or die(mysqli_error($link));

	  if($cart_query && $detail_query) {
		  echo "
		  
		  <div class = 'order-message-container'>
      <div class = 'message-container'>
	     <h3 id='h3'> Thank you for shopping! </h3>
		  <div class = 'order-detail'>
		     <span> ".$total_product." </span>
			 <span class = 'total' > Total : $ ".$price_total."/- </span>
		  </div>
		  <div class = 'customer-detail'>
		    <p> Your Name : <span> ".$name." </span> </p>
			<p> Your Number : <span>".$number." </span> </p>
			<p> Your Email : <span>".$email." </span> </p>
            <p> Your Address : <span> ".$address." , ".$city." , ".$pin_code." ,".$state." </span> </p>
            <p> Your Payment mode : <span> ".$method." </span> </p>
			<p> Your Payment date : <span> ".$date." </span> </p>
            <p> (*pay when product arrives) </p>
			</div>
			
			<a href = 'del1.php? Id=$row[Id]' class ='btn' id='b1'> continue shopping </a> &nbsp;  &nbsp;
			<a href = 'del1.php? Id=$row[Id]' class ='btn' id='b1'> ok</a>
			
		  </div>
	  </div>
	  
	  ";
  }
 }
 
?>


<html>
<head>
    <link rel="stylesheet" href="checkout2.css">
	
	
      <script src="bootstrap.min.js"> </script>
   <link rel="stylesheet" href="bootstrap.min.css">
   
   <style>
   #h3{
	   color:red;
   }
  .btn, #b1{
	   font:bold solid;
	   font-size:25px;
	   backgound-color:lightpink;
	   color:red;
	   
   }
   
   
   
   </style>
</head>

<body>
<?php include "menu.php" ; ?>
<div class = "container">

<section class="checkout-form">

     <h1 class="heading"> complete your order </h1>
	 

  <form action = "" method="POST">
  
      <div class = "display-order">
	   <?php
	     $select_cart = mysqli_query($link,"select * from cart");
		 $total =0;
		 $grand_total=0;
		 if(mysqli_num_rows($select_cart) > 0) {
			 while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
				 $total_price = ( $fetch_cart['price'] * $fetch_cart['quantity']);
				(double) $grand_total = (double)$total += (double)$total_price; 
				 ?>
				 <span> <?= $fetch_cart['product_name']; ?>(<?= $fetch_cart['quantity']; ?>) </span>
				 <?php
			 }
		 }
			 else{
				 echo "<div class='display-order'><span> your cart is empty! </span></div>";
			 }
	   ?>
	     <span class="grand-total"> grand_total : <?= $grand_total; ?>  </span>
	 </div>
	 
	 
    <div class ="flex">
	  <div class ="inputbox">
	    <span> Your Name </span>
	    <input type = "text" placeholder="Enter Your Name" name="name">
	  </div>
	  
	  <div class ="inputbox">
	    <span> Your Number </span>
	    <input type = "number" placeholder="Enter Your Number" name="number">
	  </div>
	  
	  <div class ="inputbox">
	    <span> Your Email </span>
	    <input type = "email" placeholder="Enter Your Email" name="email">
	  </div>
	  
   <!-- <div class ="inputbox">
	    <span> Payment Method</span>
	    <select name="method">
		  <option value="Cash On Devlivery" selected> Cash On Devlivery </option>
		  <option value="QR Code"> QR Code </option>
		  <option value="Credit Card"> Credit Card </option>
		  <option value ="Net Banking"> Net Banking </option>
		</select>
	  </div> -->
	  
	   <div class ="inputbox">
	    <span> Payment Method</span>
		<select name="method">
	     <option value="Cash On Devlivery" selected> Cash On Devlivery </option>
		  
		  
		</select>
	  </div>
	  
	  <div class="inputbox">
	     <span> Address </span>
		 <input type = "text" placeholder="Enter Your Address" name="address">
	  </div>
	  <div class="inputbox">
	     <span> City </span>
		 <input type = "text" placeholder="Enter Your City" name="city">
	  </div>
	  
	  <div class="inputbox">
	     <span> pin_code </span>
		 <input type = "number" placeholder="Enter Your pin_code" name="pin_code">
	  </div> 
	  
	  <div class="inputbox">
	     <span> State </span>
		 <input type = "text" placeholder="Enter Your State" name="state">
	  </div> 
	  <div class="col-md-12 text-center">
	     <input type ="submit" value = "Order now" name="order_btn"  class = "btn-info">
	  </div>
   </div>
   </form>
</section>

</div>
<!-- <script src = "js/script.js"> </script>  -->

<?php
/* if(isset($_GET['action'])) {
	 if($_GET['action'] == 'clearall') {
		 unset($_SESSION['cart']);
		 header('location:menu_home.php');
	 }
 }*/
 
?>


</body>

</html>

<!-- <a href = 'del1.php? action=clearall' class ='btn' id='b1'> ok</a>  -->