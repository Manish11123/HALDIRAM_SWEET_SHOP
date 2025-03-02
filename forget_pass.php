<?php include('config.php');
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
if(isset($_POST['submit'])){
 $email = $_POST['email'];
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
	} */
$message = $con = '';
if(isset($_POST['submit'])) {
	$email = $_POST['email'];
	
	$query = "SELECT * FROM register_mast WHERE email = '".$email."'";
	$result = $link->query($query);
	
if($result->num_rows > 0){
	// OTP Generation and sending Mailrequire 'phpmailer/src/Exception.php';
	while($row = $result->fetch_assoc()){
		$_SESSION['user']=$row['user_id'];
		echo $_SESSION['user'];
		//$id_encode = base64_encode($id);
		//$con = "<a href='reset_pass.php?MnoQtyPXZORTE=$id_encode' class='btn btn-info btn-sm'>Recieve Mail</a>";
	}
	
	
	//required files
	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';
	require 'phpmailer/src/SMTP.php';
	
	$otp = rand(100000,999999);
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
    $mail->setFrom( $email, 'Haldiram'); // Sender Email and name
    $mail->addAddress($email);     //Add a recipient email  
   // $mail->addReplyTo($_POST["email"], $_POST["name"]); // reply to sender email
	
	//Content
    $mail->isHTML(true);               //Set email format to HTML
    $mail->Subject = 'Verification';   // email subject headings
    $mail->Body    = 'your otp is:' . $otp; //email message
      
    // Success sent message alert
    if($mail->send()){
    echo "<script>alert('Message was sent successfully!');
		  document.location.href = 'otp2.php?o='+$otp;
	      </script>";
	
	}
	else{
		echo "Mail not send";
	} 
	
	
}else{
		$message = "<div class='alert alert-danger'>Invalid Email..!!</div>";
	}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>forget Password</title>
	
	<script src="jquery-3.7.0.js"> </script>
	 <link rel="stylesheet" href="bootstrap.min.css">

<!--	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
-->

</head>
<body  class="bg-secondary">
		<div class="container w-50 mt-5">
			<form class="bg-light p-5 shadow-lg" method="post">
				<!--<?php echo $message; ?>-->
				<h1 class="text-success">Forget Password</h1>
				<label for="Email">Email</label>
				<input type="email" name="email" placeholder="Email Address" class="form-control form-control-sm" required><br>
				<button type="submit" name="submit" class="btn btn-success btn-sm">Send OTP</button>
				<?php echo $con; ?>
			</form>
		</div>
</body>
</html>