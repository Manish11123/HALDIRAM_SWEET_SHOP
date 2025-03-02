
<?php
     include 'config.php';
	 
	 if(isset($_POST["addcart"]))
{ 

     $product_name = $_POST['name'];
	 $product_price = $_POST['price'];
	 $product_quantity = $_POST['qty']; 
	 

$res=mysqli_query($link,"INSERT INTO `bill`(`id`, `name`, `price`, `qty`) VALUES ('$product_name',$product_price,$product_quantity)") ;
 if(isset($_COOKIE["shopping_cart"]))
 {
  $cookie_data = stripslashes($_COOKIE['shopping_cart']);

  $cart_data = json_decode($cookie_data, true);
 }
 else
 {
  $cart_data = array();
 }

 $item_id_list = array_column($cart_data, 'item_id');

 if(in_array($_POST["hidden_id"], $item_id_list))
 {
  foreach($cart_data as $keys => $values)
  {
   if($cart_data[$keys]["item_id"] == $_POST["hidden_id"])
   {
    $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
   }
  }
 }
 else
 {
  $item_array = array(
   'item_id'   => $_POST["hidden_id"],
   'item_name'   => $_POST["hidden_name"],
   'item_price'  => $_POST["hidden_price"],
   'item_quantity'  => $_POST["quantity"]
  );
  $cart_data[] = $item_array;
 }

 
 $item_data = json_encode($cart_data);
 setcookie('shopping_cart', $item_data, time() + (86400 * 30));
 header("location:index.php?success=1");
}

if(isset($_GET["action"]))
{
 if($_GET["action"] == "delete")
 {
  $cookie_data = stripslashes($_COOKIE['shopping_cart']);
  $cart_data = json_decode($cookie_data, true);
  foreach($cart_data as $keys => $values)
  {
   if($cart_data[$keys]['$item_array_id'] == $_GET["id"])
   {
    unset($cart_data[$keys]);
    $item_data = json_encode($cart_data);
    setcookie("shopping_cart", $item_data, time() + (86400 * 30));
    header("location:index.php?remove=1");
   }
  }
 }
 if($_GET["action"] == "clear")
 {
  setcookie("shopping_cart", "", time() - 3600);
  header("location:index.php?clearall=1");
 }
}

if(isset($_GET["success"]))
{
 $message = '
 <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Item Added into Cart
 </div>
 ';
}

if(isset($_GET["remove"]))
{
 $message = '
 <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  Item removed from Cart
 </div>
 ';
}
if(isset($_GET["clearall"]))
{
 $message = '
 <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  Your Shopping Cart has been clear...
 </div>
 ';
}



	
   ?>

<html>
<head>
  <script src="bootstrap.min.js"> </script>
   <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
   <?php
     include 'menu.php';
   ?>
   <div class="cart-container">
      <h1> shopping cart </h1>
	    <table>
		  <thead>
		     <th> name </th>
			 <th> price</th>
			 <th> quantity </th>
			 <th> total price </th>
			 <th> action </th>
		  </thead>
		  
		  <tbody>
		    <?php
			   $select_cart = mysqli_query($link, "SELECT * FROM `bill`");
			   $grand_total = 0;
			   if(mysqli_num_rows($select_cart) > 0) {
				   while($fetch_cart = mysqli_fetch_assoc($select_cart)) {
					   
		    ?>
			<tr>
			  <td> <?php echo $fetch_cart['name']; ?> </td>
			  <td> <?php echo $fetch_cart['price']; ?> </td>
			  <td class="qty">
			    <form method="post">
				<input type = "hidden" name="update_quantity_id" value = "<?php echo $fetch_cart['name']; ?>" >
				<input type = "number" min="1" max="20" name="update_quantity"  value = "<?php echo $fetch_cart['qty']; ?>" >
				</form>
			  </td>
			  <td> <?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['qty']); ?> </td>
			  <td> <a href = "cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart');" 
                    class="delete-btn">remove</a>			  </td>
			  </tr>
			  
			  <?php
			    $grand_total+=(int)$sub_total;
				   }
			   }
			  ?>
			  <tr class ="table-bottom">
			  <td>  <a href="menu_home.php" class="option-btn">continue</a></td>
			  <td colspan="3"> <h1> total amount payable </h1> </td>
			  <td style="font-weight:bold;"> $<?php echo $grand_total ?>  </td>
			 <!-- <td> <a href = "cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart');" 
                    class="delete-btn">remove</a>	 </td> -->
			
			</tr>
		
		  </tbody>
		</table>
		<div class="checkout-btn">
		<a href="check.php" class="btn" <?=($grand_total>1 )?'':'disabled'?>> </a>
		
		</div>
   </div>


</body>
</html>