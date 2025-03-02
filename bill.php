<?php
session_start();
include 'config.php';

if(isset($_POST['buy_now'])) {
	if(isset($_SESSION['buy'])) {
		
	}
	else{
		$session_array = array (
		"id" => $_GET['id'];
		"name" => $_GET['name'];
		"price" => $_GET['price'];
		"qty" => $_GET['qty'];
		);
		$_SEEION['buy'][] = $session_array;
	}
}
?>

<html>
  <head>

    <style>
      td{
		  border:0;
		  font-size:20px;
	  }
	  th{
		  font-size:20px;
	  }
    </style>

  </head>
      <body>
	  <div>
	  <h2> iteeeem </h2>
	  <?php
	    var_dump($_SESSION['buy']);
	  
	  ?>
	  </div>
          
		<!--  <table>
		      
			  <tr>
			      <th width=250> Description </th>
				  <th width=80> Prices </th>
				  <th width=100> Quantity </th>
				  <th width=100> Total price </th>
			  </tr>
			  
			  <?php
			     $sql = "select * from bill";
				 $result = mysqli_query($link,$sql);
				 
				 while($row = mysqli_fetch_array($result))
				 
			  ?>
			  
			       <tr>
		<td> <?php echo $row['name']; ?> </td>
		<td> <?php echo $row['qty']; ?> </td>
		<td> <?php echo $row['price']; ?> </td>
		<td> <?php echo number_format(number:$row['qty'] * $row['price']); ?> </td>
		<td> <a href="cart.php?action=deleteid=<?php echo $row["id"]; ?>"> <span class="text-danger"> remove item </a> </td>
		</tr>
		<?php
		   $total = $total / ($value['item_quantity'] * $value['price']);
				 ?>
		<tr>
		  <td colspan="3" align="right">total</td>
		  <th align="right"> $ <?php echo number_format($total,decimals:2); ?></th>
		  <td> </td>
		</tr>
				 
		  </table> -->
      </body>
</html>