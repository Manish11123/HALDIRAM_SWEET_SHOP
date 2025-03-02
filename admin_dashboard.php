<html>
 <head>
   <link rel="stylesheet" href="dashboard1.css">
   
   <script src="bootstrap.min.js"> </script>
    <link rel="stylesheet" href="../../css/style.css"  id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">
     <style>
    	.page-container .sidebar-menu #main-menu li#dash > a {
    	background-color: #2b303a;
    	color: #ffffff;
		}
		#dash{
			color:black;
			margin-left:20px;
			
		}

		#dash:hover{
		color:red;
		}
		
		#dash1:hover{
		color:red;
		}
		
		#dash2:hover{
		color:red;
		}
		
			#dash{
			height:200px;
			width:220px;
			background-color:#6DA5C0;
		    text-align:center;
			margin-top:30%;
			border-radius:11px;
			
		}
		
		#dash1{
			color:black;
			height:200px;
			width:220px;
			background-color:#E8BCB9;
			 text-align:center;
			 margin-top:30%;
			 border-radius:11px;

			
		}
		#dash2{
			color:black;
			height:200px;
			width:220px;
			background-color:#522B5B;
			 text-align:center;
			 margin-top:30%;
			 border-radius:11px;

			
		}
		#card{
			display:flex;
			margin-left:4%;
		}

    </style>

   
 </head>
   
  <body>
    <div class="sidebar">
      <div class="logo"></div>
      <ul class="menu">
         <li>
		   <a href="admin_dashboard.php">
		   <span>dashboard</span>
		   </a>
		 </li>
		 <li>
		   <a href="add_product.php">
		   <span>Add Items</span>
		   </a>
		 </li>
		 <li>
		   <a href="view.php">
		   <span>user view</span>
		   </a>
		 </li>
		 <li>
		   <a href="payment_view.php">
		   <span>Payment view</span>
		   </a>
		 </li>
		 <li>
		   <a href="home.php">
		   <span>logout</span>
		   </a>
		 </li>
      </ul>	
</div>	  
	  
	<!-- 
<div id="container">	
<table>
<tr> <td>
	<div id="d1">
	<h2>Request Received</h2> <br>
	<h3>42</h3>  <br><br>
	<a href="#">view</a>	
	</div> </td>
	<br>
	
	<td> <div id="d2">
	<h2>Update Records</h2> <br>
	<h3>42</h3>  <br><br>
	<a href="#">view</a>	
	</div> </td>
	<br>
	
	<td><div id="d3">
	<h2>Delete Records</h2> <br>
	<h3>42</h3>  <br><br>
	<a href="#">view</a>	
	</div> </td>
	</tr>
	</table>
	</div>
	 -->
	 
<div class="col-sm-3" id="card"><a href="table_view.php" id="dash">			
				<div class="tile-stats tile-green">
					<div class="icon"><i class="entypo-chart-bar"></i></div>
						<div class="num" data-postfix="" data-duration="1500" data-delay="0">
<h2>Total <br>Members</h2><br>	

							<?php
							include 'config.php';
							$query = "select COUNT(*) from register_mast";

							$result = mysqli_query($link, $query);
							$i      = 1;
							if (mysqli_affected_rows($link) != 0) {
							    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							        echo $row['COUNT(*)'];
							    }
							}
							$i = 1;
						
							?>
							
						</div>
				</div></a>
			</div>	
			
			<div class="col-sm-3"id="card"><a href="table_view.php" id="dash1">			
				<div class="tile-stats tile-green">
					<div class="icon"><i class="entypo-chart-bar"></i></div>
						<div class="num" data-postfix="" data-duration="1500" data-delay="0">
<h2>Total <br>product</h2><br>	

							<?php
							include 'config.php';
							$query = "select COUNT(*) from dbitems";

							$result = mysqli_query($link, $query);
							$i      = 1;
							if (mysqli_affected_rows($link) != 0) {
							    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							        echo $row['COUNT(*)'];
							    }
							}
							$i = 1;
						
							?>
							
						</div>
				</div></a>
			</div>	
			
			<div class="col-sm-3" id="card"><a href="table_view.php" id="dash2">			
				<div class="tile-stats tile-green">
					<div class="icon"><i class="entypo-chart-bar"></i></div>
						<div class="num" data-postfix="" data-duration="1500" data-delay="0">
<h2>PAYMENT <br>RECORD</h2><br>	

							<?php
							include 'config.php';
							$query = "select COUNT(*) from payment_info";

							$result = mysqli_query($link, $query);
							$i      = 1;
							if (mysqli_affected_rows($link) != 0) {
							    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							        echo $row['COUNT(*)'];
							    }
							}
							$i = 1;
						
							?>
							
						</div>
				</div></a>
			</div>	

	 
	
   </body>

</html>