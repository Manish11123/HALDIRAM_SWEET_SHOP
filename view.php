<html>
<head>
 <script src="bootstrap.min.js"> </script>
   <link rel="stylesheet" href="bootstrap.min.css">
	
	<style>
	#myInput{
		border-radius:10px;
		width:20%;
		background-color:lightyellow;
	}
	
	 body{
		  background-color:aliceblue;
	  }
	  
	  #myTable{
		  background-color:cornsilk;
		  
	  }
	  
	  thead,th{
		  background-color:lightgreen;
		  color:deeppink;
	  }
	  
	  h1{
		  color:darkcyan;
	  }
	  
	</style>
 </head>
</body>

 <center>
 <h1> USER INFOMATION </h1>

		<br>
<!-- <label for="Seaarch" id="search"> <h4>Seaarch</h4> </label> -->
 <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search..." title="Type in a name" >

      <!-- fetch data -->
		<div class="container m-auto">
		<div class="row">
		<div class="col-md-12 m-auto">
		
	<table class="table table-hover border my-5" border=2 id="myTable">

     <thead>
     <th class="col"> Id </th>
	 <th class="col"> Name </th>
	 <th class="col"> email </th>
	 <th class="col"> password </th>
	 <th class="col"> Gender </th>
	 <th class="col"> Phone.no </th>
	 <th class="col"> Address </th>
	 <th class="col"></th>
	 <th class="col"></th>
	 
     </thead>


	<tbody>
	<?php
	
	include 'config.php';
	
	$record=mysqli_query($link, "SELECT * FROM `register_mast`");

    while($row = mysqli_fetch_array($record))
	{	
	echo "
	
	<tr>
	  <td> $row[user_id] </td>
	  <td> $row[name] </td>
	  <td> $row[email] </td>
	   <td> $row[password] </td>
	    <td> $row[gender] </td>
		 <td> $row[phone] </td>
		  <td> $row[address] </td>
	 
	  <td> <a href='user_delete.php? Id=$row[user_id] ' class = 'btn btn-danger'> Delete </a> </td>
	  <td> <a href='user_update.php? Id=$row[user_id]'  class = 'btn btn-success'> Update </a>  </td>
	  
	
	</tr>
	
	";
	}
	?>
</tbody>
</table>
</div>
</div>
</div>

 <a href='navigation.php'  class = 'btn btn-info'  width='100%'> BACK </a>
 
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
	td3 = tr[i].getElementsByTagName("td")[3];
	td4 = tr[i].getElementsByTagName("td")[4];
	td5 = tr[i].getElementsByTagName("td")[5];
	td6 = tr[i].getElementsByTagName("td")[6];
	
    if (td) {
      txtValue = td.textContent || td.innerText;
	  txtValue1 = td1.textContent || td.innerText;
	  txtValue2 = td2.textContent || td.innerText;
	  txtValue3 = td3.textContent || td.innerText;
	  txtValue4 = td4.textContent || td.innerText;
	  txtValue5 = td5.textContent || td.innerText;
	  txtValue6 = td6.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue1.toUpperCase().indexOf(filter) > -1
	  || txtValue2.toUpperCase().indexOf(filter) > -1 || txtValue3.toUpperCase().indexOf(filter) > -1
	  || txtValue4.toUpperCase().indexOf(filter) > -1 || txtValue5.toUpperCase().indexOf(filter) > -1
	  || txtValue6.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</html>