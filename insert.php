

<?php

if(isset($_POST['submit'])) {
	
	include 'config.php';
	
	$product_name=$_POST['pname'];
	$product_price=$_POST['pprice'];
	$product_image=$_FILES['image'];
	$image_loc=$_FILES['image']['tmp_name'];
	$image_name=$_FILES['image']['name'];
    $img_des="product/".$image_name; 
   	

	
	move_uploaded_file($image_loc,"product/".$image_name);
	$product_category= $_POST['pages'];
	
	//insert product
	
	$query= "INSERT INTO `dbitems`( PName, PPrice, PImage, PCategory) 
	VALUES ('$product_name','$product_price','$img_des','$product_category')";
	
	$res=mysqli_query($link,$query);
	
	 header("location:add_product.php");
	
   }
   


?>

     