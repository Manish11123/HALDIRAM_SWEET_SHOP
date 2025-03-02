

<html>
<head>
  <script src="bootstrap.min.js"> </script>
  <style>
    table{
		height:35px;
		width:50%;
		align:center;
	}
	
	table,tr,th,td{
		
		align:center;
		margin-top:20px;
	}
  </style>
</head>
<body>

   <form method="get">
     <input type="text" name="id" placeholder="Value To Search" >
	 <input type="submit" name="search" value="filter">
	 
	 <table>
	 <!--  <tr>
	     <th> Id </th>
		 <th> Name </th>
		 <th> Email </th>
		 <th> Password </th>
		 <th> Gender </th>
		 <th> Phone </th>
		 <th> Address </th>
		 
	   </tr>-->
	   <?php
	   include "config.php";
	   if(isset($_GET['search'])){
		   $id = $_GET['id'];
		   $query = "select * from register_mast where user_id = $id";
		   $result=mysqli_query($link,$query) or die("Please enter id");
	     while($row = mysqli_fetch_array($result))  
		 {
			echo "
	   <tr>
	     <td> $row[user_id] </td>
		 <td> $row[name] </td>
		 <td> $row[email] </td>
		 <td>  $row[password] </td>
		 <td> $row[gender] </td>
		 <td> $row[phone] </td>
		 <td>  $row[address] </td>
	   </tr>
		 ";}
	   }
	   ?>
	 </table>
   </form>
	
</body>
</html>