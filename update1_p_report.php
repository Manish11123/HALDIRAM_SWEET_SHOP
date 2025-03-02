<html>
<head>
<style>
 body{
		  background-color:aliceblue;
	  }
	  
	  input,button{
		 padding: 5px 15px; 
		 margin: 10px 0;
	  }
	  
	  h1{
		  color:violet;
	  }
	  
	  #id{
		  color:black;
		  text-decoration:none;
		   margin-top:4rem;
	  }
	  #bgcolor{
		  height:63%;
		  width:50%;
		  background-color:palegreen;
		  border-radius:2rem;
	  }
	  
	  .container m-auto{
		  margin-top:rem;
</style>
</head>

<body id="id">
<center> <h1> Update Product</h1>  </center>
<br>
    <?php
	  
    
    $ID = $_GET['Id'];
	 include 'config.php';
	$SQL="SELECT * FROM `dbitems` WHERE Id = $ID";

	$Res = mysqli_query($link,$SQL);
	$data = mysqli_fetch_array($Res); 
	
	
	?>
	



     <center>
	 <div id="bgcolor">
	
   <form action="update1.php" method="POST" enctype="multipart/form-data">
  
   product name:<input type="text" value="<?php echo $data['PName'] ?>"  name="pname"> 
   <br>
   product price:<input type="text"  value="<?php echo $data['PPrice'] ?>"  name="pprice" >
   <br>
   <td>product image:<input type="file"  value="<?php echo $data['PImage'] ?>"  name="image" > <br>
   <img src="<?php echo $data['PImage'] ?>" height='90px' width='120px'> </td> 
    
     
  <br>
   select page category:<select value="<?php echo $data['PCategory'] ?>" name="pages" >
   <option value="home"> home </option>
   <option value="sweets"> sweets  </option>
   <option value="namkeen"> namkeen  </option>
   <option value="cakes"> cakes  </option>
   
   </select>
   <br>
   <input type="hidden" name="Id" value="<?php echo $data['Id'] ?>"  >
   <button type="submit" name="update" class="btn btn-danger"> update </button>
   </form>
   </div>
   </center>

  
</body>
</html>