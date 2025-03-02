<!DOCTYPE html>
<html lang="en">
  <head>
  <style>
    .preview{
		position:absolute;
		top: 60%;
		text-align:center;
		padding-left:6%;
		font-size:23px;
		letter-spacing:5px;
		color:aqua;
	}
	
	#cap{
		height:55px;
		width:95%;
		text-align:center;
		border-radius:8px;
	}
  
  .captcha-refresh{
	  height:37px;
	  width:37px;
	  border-radius:8px;
	  background-color:aqua;
  }
  
  </style>
  
    <title>Login Form with Captcha</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin1.css" />
  </head>
  <body id="body">
  <div id="login-form">
   <div class="login-form">
     <img src="login.png" id="logo">
       <form method="POST">
            <h1> LOGIN </h1>
  <div class="form-input">
    <label for="username">Username</label>
    <input type="text" placeholder="Enter Your Username" id="Username" name="uname">
  </div>
  <div class="form-input">
    <label for="password">Password</label>
    <input type="Password" placeholder="Enter Your Password" id="Password" name="pswd">
  </div>
  <div class="captcha">
    <label for="captcha-input">Enter Captcha</label>
	<img src="captcha.png" id="cap">
    <div class="preview" > </div>
    <div class="captcha-form">
      <input type="text" id="captcha-form" placeholder="Enter captcha text">
      <button class="captcha-refresh">
        <i class="fa fa-refresh"></i>
      </button>
    </div>
  </div>
  <div class="form-input">
   <input type="submit" id="submit" value="login" name="submit">
   <!-- <button id="login-btn">Login</button> -->
	</form>
  </div>
</div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="caplog.js"></script>
	
    

<?php
	     if(isset($_POST['submit']))
		 {
			 $uname = $_POST['uname'];
			 $pass = $_POST['pswd'];
			 
			 if($uname == "manish" && $pass == "manish123")
			 {
				// setcookie("username",$uname,time()+24*60*60);
				// setcookie("Password",$pass,time()+24*60*60);
				echo "<script> 
				alert('Successfully Logging !'); 
				document.location.href = 'navigation.php';
				</script>";
				 //header('Location:navigation.php');
			 }
			 else{
				 echo "<script> alert('Invalid Username or Password'); </script>";
			 }
		 }
	 ?>
  </body>
</html>