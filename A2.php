<?php
session_start();

 include 'config.php';
 
 if(isset($_POST['submit'])) {
	 if(isset($_SESSION['cart'])) {
		 $session_array_id = array_column($_SESSION['cart'] , 'id');
		 if(!in_array($_GET['id'], $session_array_id)) {
			$session_array = array(
			'id'   => $_GET['id'],
            'name'   => $_POST['name'],
            'price'  => $_POST['price'],
            'quantity'  => $_POST['quantity']  
			);
			 $_SESSION['cart'][] = $session_array;
		 }
		 
	 }
	 else{
		 $session_array = array(
			'id'   => $_GET['id'],
            'name'   => $_POST['name'],
            'price'  => $_POST['price'],
            'quantity'  => $_POST['quantity'] 
		 );
		 $_SESSION['cart'][] = $session_array;
	 }
 }
 
?>
<html>
<head> 
  
      <script src="bootstrap.min.js"> </script>
   <link rel="stylesheet" href="bootstrap.min.css">
</head>
   <body>
      <div class="container-fluid">
	   <div class="col-md-12">
	     <div class="row">
		  <div class="col-md-6">
		    <h2 class="text-center"> shoopping</h2>
			 <div class="col-md-12">
			    <div class="row">
				
				
				
				<?php
				 $query= "SELECT * FROM `bill`";
				 $result=mysqli_query($link,$query);
				 
				 
				 while($row = mysqli_fetch_array($result)) {
					 ?>
					  <div class="col-md-4">
					 <form method="post" action="A2.php?id=<?=$row['id'] ?>">
					   <h2><?= $row['name']; ?></h2>
					   <h2><?= $row['price']; ?></h2>
					   <input type ="hidden" name="name" value="<?= $row['name'] ?>">
					   <input type ="hidden" name="price" value="<?= $row['price'] ?>">
					   <input type="number" name="quantity" class="form-control">
					   <input type ="submit" name ="submit" value="add"> 
                      					 
					 
					 </form>
					</div> 
					 
				 <?php }
				?>
				</div>
			 </div>
		  </div>
		   <div class="col-md-6">
		   <h2 class="text-center"> select items</h2>
		   <?php
		    // var_dump($_SESSION['cart']);
		
			$output = "";
			
			$output .= "
			<table class='table table-bordered table-striped'>
			  <tr>
			  <th> id </th>
			  <th> name </th>
			  <th> price </th>
			  <th> quantity </th>
			  <th> total price </th>
			  <th> action </th>
			  <th>  </th>
			  </tr>
			</table>
			";
			if(!empty($_SESSION['cart'])) {
				foreach($_SESSION['cart'] as $key => $value)
				echo "
				<tr>
				<td> $value['id'] </td>
				<td> $value['name'] </td>
				<td> $value['price'] </td>
				<td> $value['quantity'] </td>
				<td>echo "$sub_total=number_format($value['price'] * $value['quantity']);" </td>
				<td> 
				</td>
				
				";
			}
		   ?>
		 </div>
	   </div>
      </div>	
    </div>	  
   </body>
</html>