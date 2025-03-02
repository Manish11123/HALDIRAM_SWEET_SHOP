<?php include('config.php');
session_start();
$message="";
$flag=0;

if ($_SESSION['user'] == '') {
		header("location:forget_pass.php");
}
else
{
if(isset($_POST['submit'])) {
	$password = $_POST['password'];
	$Repassword = $_POST['Repassword'];

	if ($password !== $Repassword) {
		$message = "<div class='alert alert-danger'>Password Not Match..!!</div>";
	}
	else{
	$id = $_SESSION['user'];
	$query = "UPDATE register_mast SET password = '$password' WHERE user_id = $id ";
	$result = $link->query($query);
		if($result){
			$message = "<div class='alert alert-success'>Reset Your Password Successfully..</div>";
			$Home = "<a href='login.php' class='btn btn-success btn-sm'>Login</a>";
			$flag=1;
	}else{
		$message = "<div class='alert alert-danger'>Failed to Reset Password..!!</div>";
	}
	}
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
<body class="bg-secondary">
		<div class="container w-50 mt-5">
			<form class="bg-light p-5 shadow-lg" method="post">
				<?php echo $message;?>
				<h1 class="text-success">Reset Password</h1>
				<label for="password">New Password</label>
				<input type="text" name="password" placeholder="Password" class="form-control form-control-sm" required><br>
				<label for="password">Retype Password</label>
				<input type="text" name="Repassword" placeholder="Retype Password" class="form-control form-control-sm" required><br>
				<button type="submit" name="submit" class="btn btn-success btn-sm">Reset Password</button> 
                <?php
				 if($flag==1){
					 echo $Home;
					 session_destroy();
				 }
				?>				
				</form>
		</div>
</body>
</html>