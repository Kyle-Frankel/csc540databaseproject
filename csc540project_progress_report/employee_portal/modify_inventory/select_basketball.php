<?php
require '../../connect/database.php';

$conn = getConnection();

$sql = "SELECT item_id, item_name, item_price, item_stock, cat_id FROM csc540.item where cat_id = 2";
$result = mysqli_query($conn, $sql);
$output = ' 
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">ID</th>
                     <th width="20%">Item Name</th>  
                     <th width="20%">Price</th>  
                     <th width="20%">Quantity</th> 
                     <th width="20%">Category</th> 
                     <th width="10%">Delete</th>  
                </tr>';
if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_array($result))
    {
        $output .= '  
                <tr>  
                     <td>'.$row["item_id"].'</td> 
                     <td class="item_name" data-id1="'.$row["item_id"].'" contenteditable>'.$row["item_name"].'</td>  
                     <td class="item_price" data-id2="'.$row["item_id"].'" contenteditable>'.$row["item_price"].'</td>  
                     <td class="item_stock" data-id3="'.$row["item_id"].'" contenteditable>'.$row["item_stock"].'</td>  
                     <td class="cat_id" data-id4="'.$row["item_id"].'" contenteditable>'.$row["cat_id"].'</td>  
                     <td><button type="button" name="delete_btn" data-id5="'.$row["item_id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';
    }
    $output .= '  
           <tr>  
                <td></td>  
                <td id="item_name" contenteditable></td>  
                <td id="item_price" contenteditable></td>  
                <td id="item_stock" contenteditable></td> 
                <td id="cat_id" contenteditable></td> 
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
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