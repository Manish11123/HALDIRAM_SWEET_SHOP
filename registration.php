<?php
session_start();

?>

<?php
 /*
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
//required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
 $otp = rand(100000,999999);
//Create an instance; passing true enables exceptions
function validate_otp($email){
 //$email = $_POST['email'];
 //$otp = rand(100000,999999);
 //$checkotp = $_POST['checkotp'];
  $mail = new PHPMailer(true);
 
    //Server settings
    $mail->isSMTP();                              //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;             //Enable SMTP authentication
    $mail->Username   = 'ms45252124@gmail.com';   //SMTP write your email
    $mail->Password   = 'wwewnyywdfbxytoj';      //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
    $mail->Port       = 465;                                    
 
    //Recipients
    $mail->setFrom( $_POST["email"], 'Haldiram'); // Sender Email and name
    $mail->addAddress($email);     //Add a recipient email  
   // $mail->addReplyTo($_POST["email"], $_POST["name"]); // reply to sender email
    //$otp = rand(100000,999999);
 
    //Content
    $mail->isHTML(true);               //Set email format to HTML
    $mail->Subject = 'Verification';   // email subject headings
    $mail->Body    = 'your otp is:' . $otp; //email message
      
    // Success sent message alert
    if($mail->send()){
    echo " 
    <script> 
	 alert('Message was sent successfully!');
     document.location.href = 'otp2.php?o='+$otp;
    </script>
    ";
	}
	else{
		echo "Mail not send";
	}
}*/
?>

<html>
<head>

<style>
   #submit{
	   background-color:violet;
   }
   
   div.error {
        color: red;
	   font-size: 16px; /* Adjust font size as needed */
	   font-weight: bold; 
    }
   
</style>
 
 
    <link rel="stylesheet" href="style1.css">
	<script>
	    const input = document.getElementById('fname');
			input.setAttribute('required','');
		
	</script>
	
	<script src="jquery-3.7.0.js"> </script>
	
	
	<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
$(document).ready(function() {
    $("#registrationForm").validate({
        rules: {
            fname: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            pwd: {
                required: true,
                minlength: 6
            },
            gender: {
                required: true
            },
            pno: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10
            },
            adr: {
                required: true
            },
            check: {
                required: true
            }
        },
        messages: {
            fname: {
                required: "Please enter your name."
            },
            email: {
                required: "Please enter your email address.",
                email: "Please enter a valid email address."
            },
            pwd: {
                required: "Please enter your password.",
                minlength: "Password must be at least 6 characters long."
            },
            gender: {
                required: "Please select your gender."
            },
            pno: {
                required: "Please enter your phone number.",
                digits: "Please enter only digits.",
                minlength: "Phone number must be 10 digits long.",
                maxlength: "Phone number must be 10 digits long."
            },
            adr: {
                required: "Please enter your address."
            },
            check: {
                required: "Please agree to the terms and conditions."
            }
        },
        errorElement: "div",
        errorPlacement: function(error, element) {
            error.insertAfter(element);
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});
</script>

               
	
	
	
	
	
	<script>
	   function enable() {
		   var check= document.getElementById("check");
		   var submit= document.getElementById("submit");
		   if(check.checked) {
			   submit.removeAttribute("disabled");
		   }
		   else{
			   submit.disabled="true";
		   }
	   }
	   
	   function blink_text() {
		   $('.blink').fadeOut(500);
		   $('.blink').fadeIn(500);  
	   }
	   setInterval(blink_text,1000);
	   
	</script>
</head>
<?php
if(isset($_POST['submit']))  {
	include 'config.php';
	
	$name=$_POST['fname'];
	$password=$_POST['pwd'];
	$email=$_POST['email'];
	$gender=$_POST['gender'];
	$phone=$_POST['pno'];
	$address=$_POST['adr'];
	
	$getdata="select * from register_mast where name='$name' AND email='$email' ";
	$getresult = mysqli_query($link , $getdata);
	$getdatar = mysqli_num_rows($getresult);
	
	if($getdatar > 0)
	{
		echo "<script> alert('User Already Exits'); </script>";
	}
	else{
	//validate_otp($email);
	
	$query= "INSERT INTO `register_mast`( `name`, `password`, `email`, `gender`, `phone`, `address`) 
	VALUES ('$name','$password','$email','$gender',$phone,'$address')";
	
	$res=mysqli_query($link,$query);
	if($res)
	{
		echo "<script> alert('Account Created'); </script>";
		//header('location:login.php');
	}
	else{
		echo "Not Created";
	}
	
	
	//header('location:login.php');
	}
}
?>


<body id="reg1">
<div id="reg">
<form method="POST" id="registrationForm">
<h1 class="blink"> Registration </h1>

    Name: &nbsp; &nbsp; <input type="text" name="fname" id="fname"  > 
  <br><br>
  
    Email ID:  <input type="email" name="email" id="email"> 
   <br><br>
   
    Password:  <input type="Password" name="pwd" id="pwd">  
   <br><br>
    Gender: &nbsp; &nbsp; &nbsp;  
    <select name="gender" >
    <option value="male"> Male </option>
	<option value="female"> Female </option>
	
	</select>
	<br><br>
	
   Phone No:  <input type="number" name="pno" id="pno" >  
   <br><br>
   
   Address:  <textarea rows=5 col=12 id="adr" name='adr'>  </textarea> 
	<br><br>
	
	<input type="checkbox" id="check" onclick="enable()">
	<a href="#">Remember me Term & Condition </a>
	<br><br>
	
	<button disabled="true" id="submit" name="submit">  Submit  </button> &nbsp;  
	<font color="black"> <button id="submit"><a href="home.php">back</a></button> </font>
	</form>

</div>
<?php
//if(isset($_POST['submit'])){
//header('location:login.php');
//}
?>
</body>
</html>