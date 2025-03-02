<!--<meta http-equiv="refresh" content="60; url=menu_home.php">-->
<?php
 //include 'del.php';
 //session_start();
 if(isset($_SESSION['cart'])){
     print_r($_SESSION['cart']);
 }
 ?>

<html>
<head>
<link rel="stylesheet" href="style.css">

  <link rel="stylesheet" href="bootstrap.min.css"> 
  
  <style>
    #check{
		text-decoration:none;
		color:white;
	}
  </style>
  
</head>
<body>

<?php
 
 include 'cart_icon.php';

?>
    <div class="container">
	<div class="row">
	<div class="col-lg-12 text-center bg-light mb-4 rounded ">
	<h1 class="text-warning font-monospace text-center my-3"> Mycart</h1>
	</div>
	</div>
	</div>
	
	<div class = "container-fluid">
	<div class="row justify-content-around">
	<div class="col-sm-12 col-md-6 col-lg-9">
	<table class= "table table-bordered text-center ">
	<thead class="bg-danger text-white fs-5 ">
	
	<th> Index No.	</th>
	<th> Product Name </th>
	<th> Product price </th>
	<th> Product Quantity </th>
	<th> Total Price </th>
	<th> Update </th>
	<th> Delete </th>
	
	</thead>
	
	<tbody>
	<?php
	
	
	$ptotal = 0;
	$total = 0;
	
	if(isset($_SESSION['cart'])) 
	{
		foreach($_SESSION['cart'] as $key => $value) {
		
			$i = $key + 1;  // used for starting index no. is 1
			$ptotal = $value['productPrice'] * $value['productQuantity'] ;
			$total += $value['productPrice'] * $value['productQuantity'] ; $ptotal = $value['productPrice'] * $value['productQuantity'] ;
			
		echo " 	
		<form action = 'insertcart.php' method = 'POST'>
			<tr>
			  <td> $i </td>
			  <td> <input type = 'hidden' name = 'PName' value = '$value[productName]'> $value[productName] </td>
			  <td> <input type = 'hidden' name = 'PPrice' value = '$value[productPrice]'> $value[productPrice] </td>
			  <td> <input type = '' name = 'PQuantity' value = '$value[productQuantity]'> </td>
			  <td> $ptotal </td>
			  <td> <button name = 'update' class = 'btn-warning'> Update </button> </td>
			  <td> <button name = 'remove' class = 'btn-danger'> Delete </button> </td>
			  
			  <td> <input type = 'hidden' name = 'item' value = '$value[productName]' > </td>

			 </tr>
			</form>
			";
		}
	}
	
	?>
	</tbody>
	
	</table>
	
	</div>
	
	<div class = "col-lg-2  text-center">
	<h3> TOTAL </h3>
	<h1 class = "bg-danger text-white"> <?php echo  number_format($total,2)?> </h1>
	</div>
	</div>
	</div>
<center> <button class = 'btn-primary'><a href="check.php" id="check"> Checkout Process </a></button> </center>
<!--<a href = 'viewcart.php? action=clearall' class ='btn' id='b1'> clear</a>-->
<?php
include 'config.php';
/* if(isset($_GET['action'])) {
	 if($_GET['action'] == 'clearall') {
		 mysqli_query($link , "DELETE * FROM `cart`" );
		 unset($_SESSION['cart']);
		 
		 header('location:viewcart.php');
	 }
 }*/
 
 
?>

</body>
</html>
			<!--  <td> <input type = 'hidden' name = 'id' value = '$value[id]' > </td> -->