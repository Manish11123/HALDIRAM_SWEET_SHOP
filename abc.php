
<?php
session_start();
if(isset($_SESSION['username'])) {
}else{
	echo "error";
} ?>


<html>
<head>
    
	<style>
	   label{
		   color:lightseagreen;
	   }
	   #color{
		   color:greenyellow;
	   }
	
	</style>

</head>
<body>

<center>
<h1 id="color"> welcome ,
<label>
<?php echo $_SESSION['username'];?>
</label>
 </h1>
 </center>

</body>
</html>