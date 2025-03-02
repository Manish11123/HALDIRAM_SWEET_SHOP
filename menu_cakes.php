<?php
include "abc.php";
?>

<html>
<head>


    <?php
	     include 'menu.php';
	?>

</head>
<body>

    <div class="container-fluid">
	<div class="col-md-12">
	<div class="row">

<h1 class="text-warning font-monospace text-center my-4"> CAKES </h1>

    <?php
	    include 'config.php';
		$record =mysqli_query($link, "select * from dbitems");
		while($row = mysqli_fetch_array($record))
		{
		    $check_page = $row['PCategory'];
            if($check_page ==='cakes')
			{				
			

     echo "
     
	 <div class='col-md-6 col-lg-4 m-auto mb-3'>
	 
	  <form action = 'insertcart' method='POST'>
	 

   <div class='card m-auto' style='width: 14rem;'>
  <img src='$row[PImage]' class='card-img-top' >
  <div class='card-body'>
    <h5 class='card-title text-danger fs-4 fw-bold'>$row[PName]</h5>
    <p class='card-text text-danger fs-4 fw-bold'> RS: $row[PPrice]</p>
	<input type = 'hidden' name = 'PName' value = '$row[PName]'>
	<input type = 'hidden' name = 'PPrice' value = '$row[PPrice]'>
	<input type='number' name = 'PQuantity' value=' min= '1' max= '20'' placeholder='Quantity'> <br> <br>
    <input type='submit' name = 'addcart' class = 'btn btn-warning text-white w-100' value='Add To Cart'> 
	<br> &nbsp;
	<a href='paymet.php'>
	<input type='submit' class = 'btn btn-success text-white w-100' value='Buy Now'>
	</a>
	
    
  </div>
</div>
</form>


   </div>
         ";
			}
		}
	?>

    </div>
	</div>
	</div>
</body>
</html>