<html>
<head>
<style>
#view{
	text-decoration:none;
}
</style>
</head>

<body bgcolor="lightgrey">

    <?php
	  
    
    $ID = $_GET['Id'];
	 include 'config.php';
	$SQL="SELECT * FROM `register_mast` WHERE user_id = $ID";

	$Res = mysqli_query($link,$SQL);
	$data = mysqli_fetch_array($Res); 
	
	
	?>
	



     <center>
	 <table border=1>
   <form action="user_update1.php" method="POST">
             <h1> <font color="blue"> Update User Info </font> </h1>
    # &nbsp; &nbsp; <input type="text" name="id" id="id" value="<?php echo $data['user_id'] ?>" readonly="True"> 
  <br><br>
  
 Name: &nbsp; &nbsp; <input type="text" name="fname" id="fname" value="<?php echo $data['name'] ?>"> 
  <br><br>
  
    Email ID:  <input type="email" name="email" id="email" value="<?php echo $data['email'] ?>"> 
   <br><br>
   
    Password:  <input type="Password" name="pwd" id="pwd" value="<?php echo $data['password'] ?>">  
   <br><br>
   
    Gender: &nbsp; &nbsp; &nbsp;  
    <select name="gender" value="<?php echo $data['gender'] ?>">
		<option value="Male" >Male</option>
		<option value="Female" >Female</option>
	</select> 
	<br><br>
	
   Phone No:  <input type="number" name="pno" id="pno" value="<?php echo $data['phone'] ?>">  
   <br><br>
   
   Address:  <textarea rows=5 col=12 id="adr" name="adr" value="<?php echo $data['address'] ?>"> Address </textarea> 
	<br><br>
   <br>
   <input type="hidden" name="Id" value="<?php echo $data['user_id'] ?>"  >
   <button type="submit" name="update" class="btn btn-danger"> update </button> &nbsp; &nbsp; &nbsp;
   <button type="submit" name="update"  class="btn btn-danger" > <a href="view.php" id="view"> Back </a> </button>
   
   </form>
   </table>
   </center>

  
</body>
</html>