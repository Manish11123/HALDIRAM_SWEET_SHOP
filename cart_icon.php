<html>
<head>

 <link rel="stylesheet" href="https://cdnjs.cloudflare.
com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


<style>
.float-right{
	float:right;
}

</style>

</head>
<body>
<?php
session_start();
$count = 0;
if(isset($_SESSION['cart']))
{
	$count = count($_SESSION['cart']);
}

?>
<div class="float-right">
<div class = "container-fluid float-right ">

<a href= "viewcart.php" class= "text-warning text-decoration-none pe-4"><i class ="fa fa-shopping-cart" style="font-size:28px"></i> cart(<?php echo $count ?>) </a>

<a href= "menu_home.php" class= "text-warning text-decoration-none pe-2"><i class="fas fa-sign-out-alt" style="font-size:36px"></i> </a>

</div>
</div>

</body>
</html>