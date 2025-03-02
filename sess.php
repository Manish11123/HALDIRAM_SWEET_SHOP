<html>
<head>
</head>
<body>
<?php
session_start();
if(isset($_SESSION['user']))
	{
	if((time() - $_SESSION['last_login_timestamp']) > 60)
	{  session_unset();
       session_destroy();
		header('location:log.php');
	}
}
else{
	header('location: login.php');
}
?>
</body>

</html>