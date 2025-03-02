<?php
 
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
if (isset($_POST["submit"])) {
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
	}
}
?>
