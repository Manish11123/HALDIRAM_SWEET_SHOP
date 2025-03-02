<?php

//session_start();

?>
<html>
<head>
    <link rel="stylesheet" href="style.css">

  <link rel="stylesheet" href="bootstrap.min.css"> 
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.
com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

          <style>
	   h2{
		   color:red;
		   font-style:italic;
		   font-style:bold;
	   }
	 </style>
		  
</head>

<body>
<?php
//session_start();
$count = 0;
if(isset($_SESSION['cart']))
{
	$count = count($_SESSION['cart']);
}

?>

<h2> menu card </h2>

<div class = "container-fluid">
<a href= "viewcart.php" class= "text-warning text-decoration-none pe-2"><i class ="fa fa-shopping-cart" style="font-size:28px"></i> cart(<?php echo $count ?>) </a>

</div>
 <button id="menu"> <a href="home.php" > Home </a> </button>
   

<br>
<br>

  <div class="bg-danger font-monospace">
  
     <ul class="list-unstyled d-flex justify-content-center">
	    <li> <a href="menu_home.php" class="text-decoration-none text-white fw-bold fs-4 px-5"> FAST FOOD </a> </li> 
		<li> <a href="menu_namkeen.php" class="text-decoration-none text-white fw-bold fs-4 px-5"> NAMKEEN </a> </li>
		<li> <a href="menu_sweet.php" class="text-decoration-none text-white fw-bold fs-4 px-5"> SWEETS</a> </li>
		<li> <a href="menu_cakes.php" class="text-decoration-none text-white fw-bold fs-4 px-5"> CAKES </a> </li>
	    
	 </ul> 
   	 
 </div>


</body>
</html>