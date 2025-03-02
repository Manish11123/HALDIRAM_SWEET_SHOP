

<?php
include 'config.php';
session_start();
//session_destroy();
//$id=$_GET['id'];

     $product_name = $_POST['PName'];
	 $product_price = $_POST['PPrice'];
	 $product_quantity = $_POST['PQuantity']; 
	 
if(isset($_POST['addcart'])) 
{
	if(isset($_SESSION['cart'])){
		$check_product = array_column($_SESSION['cart'], 'productName');
	    if(in_array($product_name , $check_product)) {
		    echo "
		         <script>
				alert('product already added');
				window.location.href = 'menu_home.php';
				</script>";
		//$_SESSION['last_login_timestamp'] = time();
		//header('location:sess.php');
		}
    	else{
			$_SESSION['cart'][] = array('productName' => $product_name ,
                           	 'productPrice' => $product_price ,
   							'productQuantity' => $product_quantity  );
								$res=mysqli_query($link,"INSERT INTO `cart`( `product_name`, `price`, `quantity`)
                                  VALUES ('$product_name',$product_price,$product_quantity)") ;
	                        header ("location:viewcart.php");
		}
	}
	 else{
	 $_SESSION['cart'][] = array('productName' => $product_name ,
                           	 'productPrice' => $product_price ,
   							'productQuantity' => $product_quantity  );
								$res=mysqli_query($link,"INSERT INTO `cart`( `product_name`, `price`, `quantity`)
                                  VALUES ('$product_name',$product_price,$product_quantity)") ;
	                        header ("location:viewcart.php");
							
}
}

           //REMOVE product
		   
		  if(isset($_POST['remove']))
		  {
			  $itname= $_POST['PName'];
			   foreach($_SESSION['cart'] as $key => $value)
			   {
				   if($value['productName'] === $itname) 
				   {
					   
					  mysqli_query($link , "DELETE FROM `cart` WHERE product_name='$itname'" );
					  
					  unset($_SESSION['cart'] [$key] );
					  $_SESSION['cart'] = array_values($_SESSION['cart'] );
					   header('location:viewcart.php');
				   }
			   }
		   } 
		   
		   //clear product
		 /*  
		  if(isset($_POST['clear']))
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
		   
		   
		      
			  
				         //UPDATE product
						 
						 if(isset($_POST['update']))
		   {
			   $itname= $_POST['PName'];
			   foreach($_SESSION['cart'] as $key => $value)
			   {
				   if($value['productName'] === $itname) 
				   {
					  $_SESSION['cart'] [$key] = array('productName' => $product_name ,
                           	                           'productPrice' => $product_price ,
   							                          'productQuantity' => $product_quantity  );
													//  UPDATE `cart` SET `id`='[value-1]',`product_name`='[value-2]',`price`='[value-3]',`quantity`='[value-4]' WHERE 1
	$sql=  "UPDATE `cart` SET `quantity`='$product_quantity' WHERE product_name='$itname'";
	$res= mysqli_query($link,$sql);
	                                                   header ("location:viewcart.php");
					  
				   }
			   }
		   }
						 
						 
?>