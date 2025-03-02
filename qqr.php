<html>
<body>
<h1> hiiiiiiiiiiiiiiiii..... </h1>
<form method="POST">
<input type="text" name ="name">
<input type="submit" name="submit1" value="click">
</form>

<?php
include 'config.php';
if(isset($_POST['submit1'])){
	header('location:check.php');
}else{
	echo "error";
}
?>
</body>
</html>



when we click any option on payment method redirect another page