<?php  
 //filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      include "config.php";  
      $output = '';  
      $query = "  
           SELECT * FROM `order`  
           WHERE date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  
      ";  
      $result = mysqli_query($link, $query);  
      $output .= '  
           <table class="table table-bordered">  
                <tr>  
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
                </tr>  
      ';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                            
                          <td>'. $row["Id"] .'</td>  
                          <td>'. $row["name"] .'</td>  
                          <td>'. $row["number"] .'</td>  
                          <td>'. $row["email"] .'</td>  
						  <td>'. $row["method"] .'</td> 
						  <td>'. $row["address"] .'</td> 
						  <td>'. $row["city"] .'</td> 
						  <td>'. $row["pin_code"] .'</td> 
						  <td>'. $row["state"] .'</td> 
						  <td>'. $row["date"] .'</td> 
                     </tr>  
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">No Order Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 }  
 ?>