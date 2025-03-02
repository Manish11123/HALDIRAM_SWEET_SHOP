<?php

session_start();

if(isset($_POST['submit']))  {
	include 'config.php';
	
	$name=$_POST['fname'];
	$password=$_POST['pwd'];
	
	
	$getdata="select * from register_mast where name='$name' AND password='$password' ";
	$getresult = mysqli_query($link , $getdata);
	$getdatar = mysqli_fetch_array($getresult);
	
	if(!empty($getdatar))
	{
		//echo "<script> alert('User Already Exits'); </script>";
		$_SESSION['username'] = $getdatar['fname'];
		header('location:menu_home.php');
		
	}
	else{
	   echo "error";
	
	//header('location:login.php');
	}
}

?>


<html>
<head>

<script src="angular.min.js"> </script>

<style>
   #submit{
	   background-color:grey;
   }
   
   
   
   
</style>

   <link rel="stylesheet" href="style.css">
   
   <script src="jquery-3.7.0.js"> </script>
   
<script>
       function blink_text() {
		   $('#blink').fadeOut(500);
		   $('#blink').fadeIn(500);  
	   }
	   setInterval(blink_text,1500);
   </script>
</head>

<body bgcolor="lightyellow">
    <div id="login-form1">
	<img src="user.png" id="user-logo">
	<div ng-app="">
      <form method="POST" name="studentForm" novalidate>
	     <h1 id="blink"> LOGIN </h1>
		<br>
		
        Username:   <input type="text"  placeholder="Enter Your Username"  name="fname" ng-model="student.fname" ng-required="true" />
       <span ng-show="studentForm.fname.$touched && studentForm.fname.$error.required" > <font color="red"> <b> Username is required. </b> </font></span>
         		
		<br><br>
		Password:   <input type="Password" placeholder="Enter Your Password"  name="pwd" ng-minlength="8" ng-maxlength="15" ng-model="student.pwd"  />
		 <span ng-show="studentForm.pwd.$touched && studentForm.pwd.$error.minlength"> <font color="red"> <b> Enter Password Minimun 8 letter. </b> </font> </span>
         <span ng-show="studentForm.pwd.$touched && studentForm.pwd.$error.maxlength"> <font color="red"> <b> Enter Password Maximum 15 letter. </b> </font> </span>
           
		<br><br><br>
	<!-- <input type="submit" id="submit" value="login" name="submit"> -->
		<button type="submit" id="submit" ngClick="submit" name="submit"> login </button> &nbsp; 
		<!-- <button type="submit" id="submit" name="submit"> Login </button> &nbsp; -->
	    <button id="submit"><a href="home.php">back</a></button> 
		
		
      </form>
     </div>
	 </div>
</body>
</html>