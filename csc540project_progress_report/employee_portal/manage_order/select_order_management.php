<?php

require "../../connect/database.php";

$conn = getConnection();

$sql = "SELECT order_id, customer_id, first_name, last_name, order_date, item_id, quantity, item_name, item_price FROM csc540.customer_order NATURAL JOIN order_details NATURAL JOIN  item NATURAL JOIN customer";
$result = mysqli_query($conn, $sql);
$output = ' 
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="5%">Order ID</th>
                     <th width="5%">Customer ID</th>  
                     <th width="5%">First Name</th>
                     <th width="5%">Last Name</th>
                     <th width="5%">Order_Date</th>  
                     <th width="5%">Item ID</th> 
                     <th width="5%">Item Name</th> 
                     <th width="5%">Item Price</th> 
                     <th width="5%">Quantity</th> 
                    
                </tr>';
if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_array($result))
    {
        $output .= '  
                <tr>  
                     <td>'.$row["order_id"].'</td> 
                     <td class="item_name" data-id1="'.$row["order_id"].'">'.$row["customer_id"].'</td>  
                     <td class="item_price" data-id3="'.$row["order_id"].'">'.$row["first_name"].'</td>  
                     <td class="item_price" data-id4="'.$row["order_id"].'">'.$row["last_name"].'</td>  
                     <td class="item_price" data-id5="'.$row["order_id"].'">'.$row["order_date"].'</td>  
                     <td class="item_stock" data-id6="'.$row["order_id"].'">'.$row["item_id"].'</td>  
                     <td class="item_price" data-id7="'.$row["item_id"].'">'.$row["item_name"].'</td>  
                     <td class="item_stock" data-id8="'.$row["item_id"].'">'.$row["item_price"].'</td> 
                     <td class="quantity" data-id9="'.$row["order_id"].'">'.$row["quantity"].'</td>   
                </tr>  
           ';
    }
    $output .= '  
           
      ';
}
else
{
    $output .= '<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>';
}
$output .= '</table>  
      </div>';
echo $output;


?>