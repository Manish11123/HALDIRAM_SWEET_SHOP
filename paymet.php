<html>
<head>
    <link rel="stylesheet" href="Payment.css">
</head>
<body>

<div class="row">
  <div class="col-75">
    <div class="container">
      <form method="POST" action="">

        <!--<div class="row">
          <div class="col-50">-->
		  
            <h3>Billing Address</h3>
			
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="name" placeholder="John M. Doe">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="New York">

            <!--<div class="row">
              <div class="col-50">-->
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="NY">
             <!-- </div>-->
              
			  <!--<div class="col-50">-->
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label><br>
           <!-- <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>-->
            <label for="cname">Name on Card holder</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">

           <!-- <div class="row">
              <div class="col-50">-->
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
             <!-- </div>-->
             <!-- <div class="col-50">-->
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
             <!-- </div>
            </div>
          </div>

        </div>-->
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="submit" value="Payment" class="btn" name="submit">
      </form>
  <!--  </div>
  </div>-->
<!--
  <div class="col-25">
    <div class="container">
      <h4>Cart
        <span class="price" style="color:black">
          <i class="fa fa-shopping-cart"></i>
          <b>4</b>
        </span>
      </h4>
      <p><a href="#">Product 1</a> <span class="price">$15</span></p>
      <p><a href="#">Product 2</a> <span class="price">$5</span></p>
      <p><a href="#">Product 3</a> <span class="price">$8</span></p>
      <p><a href="#">Product 4</a> <span class="price">$2</span></p>
      <hr>
      <p>Total <span class="price" style="color:black"><b>$30</b></span></p>
    </div>
  </div>
</div>
ADVERTISEMENT

-->

<?php


if(isset($_POST['submit'])){
	
	include 'config.php';
	
	$name=$_POST['name'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$city=$_POST['city'];
	$state=$_POST['state'];
	$cname=$_POST['cardname'];
	$card_no=$_POST['cardnumber'];
	$expmonth=$_POST['expmonth'];
	$expyear=$_POST['expyear'];
	$cvv=$_POST['cvv'];
	
	$query = "INSERT INTO `payment_info`( `full_name`, `email`, `address`,
	`city`, `state`,`holder_name`, `card_number`, `exp_month`, `exp_year`, `cvv`) 
	VALUES ('$name','$email','$address','$city','$state',
	'$cname',$card_no,'$expmonth',$expyear,$cvv)";
	
	$res=mysqli_query($link,$query);
	if($res){
		echo "insert";
	}else{
		echo "error";
	}
	
	header('location:paymet.php');
}
?>
</body>
</html>
