<?php
session_start();
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" type="text/css" href="otp.css">
</head>
<body>
<form  method="POST">
  <div class="container">
    <h1>ENTER OTP</h1>
    <div class="userInput">
      <input type="text" name="checkotp" id="ist" maxlength="6" onkeyup="clickEvent(this,'sec')">
     <!-- <input type="text" name="checkotp" id="sec" maxlength="1" onkeyup="clickEvent(this,'third')">
      <input type="text" name="checkotp" id="third" maxlength="1" onkeyup="clickEvent(this,'fourth')">
      <input type="text" name="checkotp" id="fourth" maxlength="1" onkeyup="clickEvent(this,'fifth')">
	  <input type="text" name="checkotp" id="fifth" maxlength="1" onkeyup="clickEvent(this,'sixth')">
      <input type="text" name="checkotp" id="sixth" maxlength="1">-->
    </div>
    <button type="submit"name="verify">CONFIRM</button>
  </div>
  </form>
  
  <script>
  function clickEvent(first,last){
      if(first.value.length){
        document.getElementById(last).focus();
      }
    }
  
  </script>
  
  <?php
//$email = $_POST['email'];

$receiveotp=$_REQUEST['o'];

if(isset($_POST['verify'])){
	$check=$_POST['checkotp'];
	if($check != $receiveotp){
		echo " 
		<script>
		alert('OTP NOT SAME'); 
		document.location.href = 'otp2.php';
		</script>
		";
	}
	else{
		
		echo "
		<script>
		alert('OTP MATCHED');
		document.location.href = 'reset_pass.php';
		</script>
		";
		
	}
}
 

 ?>
</body>
</html>