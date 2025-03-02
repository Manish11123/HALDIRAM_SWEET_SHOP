

  <?php
   include 'config.php';
	if(isset($_POST['update'])) {
	
	$ID = $_POST['Id'];
	$product_name=$_POST['pname'];
	$product_price=$_POST['pprice'];
	$product_image=$_FILES['image'];
	$image_loc=$_FILES['image']['tmp_name'];
	$image_name=$_FILES['image']['name'];
    $img_des="product/".$image_name; 
   	

	
	move_uploaded_file($image_loc,"product/".$image_name);
	$product_category= $_POST['pages'];
	
	//update product
	
	$query= "UPDATE `dbitems` SET `PName`='$product_name',`PPrice`='$product_price',
	`PImage`='$img_des',`PCategory`='$product_category' WHERE Id = $ID";
	
	$res=mysqli_query($link,$query);
	
	 header("location:product_report.php");
	
   }
   	
	?>