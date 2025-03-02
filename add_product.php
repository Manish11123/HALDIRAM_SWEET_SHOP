<html>
<head>
      <script src="bootstrap.min.js"> </script>
	  <link rel="stylesheet" href="bootstrap.min.css">
	  
	  <style>
	  body{
		  background-color:aliceblue;
	  }
	  #id{
		  color:white;
		  text-decoration:none;
	  }
	  #color{
		  height:40%;
		  width:50%;
		  background-color:ivory;
		  border-radius:2rem;
	  }
	  
	  .container m-auto{
		  margin-top:rem;
	  }
	  h4{
		  font-style:italic;
		  color:palevioletred;
	  }
	  #bg{
		  background-color:seashell;
	  }
	  
	  </style>
</head>

<body>
   <center>
   <div id="color">
   <form action="insert.php" method="POST" enctype="multipart/form-data">
      <h4> ADD PRODUCT </h4>
	  
   product name:<input type="text" name="pname">
   <br>
   product price:<input type="text" name="pprice">
   <br>
   product image:<input type="file" name="image">
   <br>
   select page category:<select name="pages">
   <option value="home"> home </option>
   <option value="sweets"> sweets  </option>
   <option value="namkeen"> namkeen  </option>
   <option value="cakes"> cakes  </option>
   
   </select>
   <br><br>
   <button name="submit" class="btn btn-danger"> upload </button> &nbsp; &nbsp; &nbsp;
  <button name="submit" class="btn btn-info">  <a href="navigation.php" id="id">Back</a> </button> 
   </form>
   </div>
   </center>
  
      <!-- fetch data -->
		<div class="container m-auto">
		<div class="row">
		<div class="col-md-10 m-auto">
		
	<table class="table table-hover border my-5" border=2 id="bg">

     <thead>
     <th class="col"> Id </th>
	 <th class="col"> Name </th>
	 <th class="col"> Price </th>
	 <th class="col"> Image </th>
	 <th class="col"> Category </th>
	 <th class="col"> Delete </th>
	 <th class="col"> Update </th>
     </thead>


	<tbody>
	<?php
	
	include 'config.php';
	
	$record=mysqli_query($link, "SELECT * FROM `dbitems`");

    while($row = mysqli_fetch_array($record))
	{	
	echo "
	
	<tr>
	  <td> $row[Id] </td>
	  <td> $row[PName] </td>
	  <td> $row[PPrice] </td>
	  <td> <img src= '$row[PImage]' height='90px' width='120px'> </td>
	  <td> $row[PCategory] </td>
	  <td> <a href='delete.php? Id=$row[Id] ' class = 'btn btn-danger'> Delete </a>  </td>
	  <td> <a href='update.php? Id=$row[Id]'  class = 'btn btn-success'> Update </a>  </td>
	  <td> </td>
	
	</tr>
	
	";
	}
	?>
</tbody>
</table>
</div>
</div>
</div>
</body>
</html>