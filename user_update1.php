

  <?php
   include 'config.php';
	if(isset($_POST['update'])) {
	
	$id = $_POST['id'];
	$name=$_POST['fname'];
	$password=$_POST['pwd'];
	$email=$_POST['email'];
	$gender=$_POST['gender'];
	$phone=$_POST['pno'];
	$address=$_POST['adr'];
	
	//update product
	
	$query= "UPDATE `register_mast` SET `name`='$name',`password`='$password',
	`email`='$email',`gender`='$gender',`phone`='$phone',`address`='$address' WHERE user_id = $id";
	
	$res=mysqli_query($link,$query);
	
	 header("location:view.php");
	
   }
   	
	?>