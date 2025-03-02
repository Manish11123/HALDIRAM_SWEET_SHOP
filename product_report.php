<html>
<head>
      <script src="bootstrap.min.js"> </script>
	  <link rel="stylesheet" href="bootstrap.min.css">
	  
	  <style>
	  body{
		  background-color:gainsboro;
	  }
	  #id{
		  color:white;
		  text-decoration:none;
	  }
	  
	  
	  h2{
		  font-style:italic;
		  text-align:center;
		  color:firebrick;
	  }
	 
	  #myTable{
		  background-color:seashell;
	  }
	
	  </style>
	  <style>
	   
	 <!-- given css style on search bar -->
	  
	#myInput{
		border-radius:10px;
		width:20%;
		background-color:blue;
	}
	</style>
</head>

<body>
<center>
<br>
    <h2> PRODUCT REPORT </h2>
  
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search..." title="Type in a name" >

  
      <!-- fetch data -->
		<div class="container m-auto">
		<div class="row">
		<div class="col-md-10 m-auto">
		
	<table class="table table-hover border my-5" border=2 id="myTable">

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
	  <td> <a href='delete_p_report.php? Id=$row[Id] ' class = 'btn btn-danger'> Delete </a>  </td>
	 <td> <a href='update1_p_report.php? Id=$row[Id]'  class = 'btn btn-success'> Update </a>  </td> 
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


<button name="submit" class="btn btn-info">  <a href="navigation.php" id="id">Back</a> </button> 
</center>

</body>
<script>
function myFunction() {
  var input, filter, table, tr, td,td1,td2,td3,td4,td5,td6, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    
	td = tr[i].getElementsByTagName("td")[0];
	td1 = tr[i].getElementsByTagName("td")[1];
	td2 = tr[i].getElementsByTagName("td")[2];
	td3 = tr[i].getElementsByTagName("td")[4];
	
	
    if (td) {
      txtValue = td.textContent || td.innerText;
	  txtValue1 = td1.textContent || td.innerText;
	  txtValue2 = td2.textContent || td.innerText;
	  txtValue3 = td3.textContent || td.innerText;
	  
      if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue1.toUpperCase().indexOf(filter) > -1
	  || txtValue2.toUpperCase().indexOf(filter) > -1 || txtValue3.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</html>

