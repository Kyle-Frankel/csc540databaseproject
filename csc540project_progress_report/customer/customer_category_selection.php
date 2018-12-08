<?php
session_start();


require "../connect/database.php";
require "../connect/DbHandler.php";

$newConnection = new DbHandler();
$conn = $newConnection->getConnection();

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}


if (isset($_POST["category_selector"])) {
    $category_name = $_POST["category_selector"];


$sql = "SELECT item_name, item_price, item_stock, item_id FROM item NATURAL JOIN category WHERE cat_name = '$category_name'";
$res = mysqli_query($conn, $sql);
$conn->close();

echo (' 
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="25%">Item Name</th>  
                     <th width="25%">Price</th>  
                     <th width="25%">Quantity Available</th> 
                     <th width="25%">To order</th>   
                </tr>');

    while ($row = mysqli_fetch_assoc($res)){
        echo("
                <tr>
                    <td class='item_name' data-id1='".$row['item_id']."'>".$row['item_name']."</td>
                    <td class='item_price' data-id2='".$row['item_id']."'>$".$row['item_price']."</td>
                    <td class='item_stock' data-id3='".$row['item_id']."'>".$row['item_stock']."</td>
                    <td class='order_amount' data-id4='".$row['item_id']."'><input type='text' placeholder='Enter quantity'></td>
                </tr>
              ");
    }

echo("
            </table>
        </div>
");

} else {
    $category_name = null;
    echo "No category name was supplied";
}



?>

<html>
<head>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</head>
<button onclick="goBack()">Back</button>
</html>
