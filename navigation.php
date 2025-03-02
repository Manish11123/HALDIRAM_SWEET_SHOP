<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.
com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="navigation2.css">
	
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
			font-size:20px;
			
		}
		
		#dash1{
			color:black;
			height:200px;
			width:220px;
			background-color:#E8BCB9;
			 text-align:center;
			 margin-top:30%;
			 border-radius:11px;
			 font-size:20px;

			
		}
		#dash2{
			color:black;
			height:200px;
			width:220px;
			background-color:#522B5B;
			 text-align:center;
			 margin-top:30%;
			 border-radius:11px;
			 font-size:20px;

			 

			
		}
		#card1{
			display:inline-block;
		margin-left:4%; 
		}
		
		#align{
			margin-left:20%;
			text-transform:uppercase;
			font-style:italic;
            margin-top:-20px;
			}
		
		#align1{
			margin-left:30%;
			font-style:italic;
			margin-top:10px;		
		}
		
		
		
		
		
    </style>

  
</head>
<body>
 <div class="sidebar">
      <div class="logo"></div>
      
 <nav> 
 <ul class="menu">
 
 <!--
 <li>
 
 <a href="#" class="logo">
 <img src="user.ipg">
 <span class="nav-item">info code</span>
 </a>
 </li>
 -->
 
 <li><a href="#"> 
 <i class="fas fa-home"></i>
 <span class="nav-item">Dashboard</span>
 </a>
 </li>
 
 <li><a href="add_product.php"> 
 <i class="fas fa-user"></i>
 <span class="nav-item">Add items</span>
 </a>
 </li>
 
 <li><a href="view.php"> 
 <i class="fas fa-user"></i>
 <span class="nav-item">User Report</span>
 </a>
 </li>
 
 <li><a href="product_report.php"> 
 <i class="fas fa-user"></i>
 <span class="nav-item">Product Report</span>
 </a>
 </li>
 
 <li><a href="payment_view.php"> 
 <i class="fas fa-user"></i>
 <span class="nav-item">Payment Report</span>
 </a>
 </li>
 
 <!--
 <li><a href="#"> 
 <i class="fas fa-wallet"></i>
 <span class="nav-item">Wallet</span>
 </a>
 </li>
 
 <li><a href="#"> 
 <i class="fas fa-cog"></i>
 <span class="nav-item">Setting</span>
 </a>
 </li>
 -->
 
 <li><a href="home.php" class="logout" id="a1"> 
 <i class="fas fa-sign-out-alt"></i>
 <span class="nav-item">Logout</span>
 </a>
 </li>
 
 </ul>

 </nav>
 
 </div>
 
 <div id="align1">
  
 </div>
 
 	 <div id="align">
	 
<div class="col-sm-3" id="card1"><a href="view.php" id="dash">			
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
			
			<div class="col-sm-3"id="card1"><a href="add_product.php" id="dash1">			
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
			
			<div class="col-sm-3" id="card1"><a href="payment_view.php" id="dash2">			
				<div class="tile-stats tile-green">
					<div class="icon"><i class="entypo-chart-bar"></i></div>
						<div class="num" data-postfix="" data-duration="1500" data-delay="0">
<h2>PAYMENT <br>RECORD</h2><br>	

							<?php
							include 'config.php';
							$query = "select COUNT(*) from `order`";

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


    <br> <br>
    <div>
	 <center>  <button> <a href="bar_graph.php"> Graph </a> </button> </center>
	</div>
	
	<div>
	 <center>  <?php// include 'bar_graph.php';  ?> </center>
	</div>
	
</div>

</body>


</html>