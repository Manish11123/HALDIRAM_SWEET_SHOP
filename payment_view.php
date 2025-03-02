<html>
<head>
   <script src="jquery-3.7.0.js"> </script>
 <script src="bootstrap.min.js"> </script>
   <link rel="stylesheet" href="bootstrap.min.css">
  <!-- <script src="jquery-ui-1.13.2.js"></script>  
   <link rel="stylesheet" href="jquery-ui-1.13.2.css"> -->
   
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
     <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
     <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  

 
    <style>
	
	  body{
		  background-color:aliceblue;
	  }
	  
	  #order_table{
		  background-color:linen;
	  }
	  
	  thead,th{
		  background-color:lightgreen;
		  color:deeppink;
	  }
	  
	  input{
		  text-align:center;
	  }
	  
	
	  #style{
		  margin:auto;
		  width:60%;
		  border-radius:2rem;
		  padding:20px;
		  text-align:center;
		  background-color:mistyrose;
		  
	  }
	  h1{
		  color:mediumvioletred;
		  padding:5px;
	  }
	
	</style>
	
 </head>
<body>
				
 <center>
 <h1> PAYMENT INFOMATION </h1>
 
  <div id="style">
    <center>
		<div class="col-md-3">  
             <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
        </div>  
        <div class="col-md-3">  
             <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
        </div>  
        <div class="col-md-4">  
             <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" />  
        </div>  
        <div style="clear:both"></div>                 
        <br />
		</center>
   </div>		
  
      <!-- fetch data -->
		<div class="container m-auto">
		<div class="row">
		<div class="col-md-12 m-auto">
		
	<table id="order_table" class="table table-hover border my-5" border=2>

     <thead>
     <th class="col"> Id </th>
	 <th class="col"> Name </th>
	 <th class="col"> Number </th>
	 <th class="col"> Email </th>
	 <th class="col"> Method </th>
	 <th class="col"> Address </th>
	 <th class="col"> City </th>
	 <th class="col"> Pin_code </th>
	 <th class="col"> State </th>
	 <th class="col"> Payment_date </th>
	 <th class="col"> Total
	 Amount </th>
	
	 <th class="col"> </th>
     </thead>


	<tbody>
	<?php
	
	include 'config.php';
	
	$result=mysqli_query($link, "SELECT * FROM `order`");

    while($row = mysqli_fetch_array($result))
	{	
	echo "
	
	<tr>
	  <td> $row[Id] </td>
	  <td> $row[name] </td>
	  <td> $row[number] </td>
	  <td> $row[email] </td>
	  <td> $row[method] </td>
	   <td> $row[address] </td>
	    <td> $row[city] </td>
		<td> $row[pin_code] </td>
		<td> $row[state] </td>
		<td> $row[date] </td>
		<td> $row[total_price] </td>
		
	 
	  <td> <a href='payment_delete.php? Id=$row[Id] ' class = 'btn btn-danger'> Delete </a> 
	 
	   </td>
	  
	
	</tr>
	
	";
	}
	?>
</tbody>
</table>
</div>
</div>
</div>

<a href='navigation.php'  class = 'btn btn-info'  width='100%'> BACK </a>
 
</center>
</body>
</html>

<script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
           $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"filter.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                               $('#order_table').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      });  
 </script>