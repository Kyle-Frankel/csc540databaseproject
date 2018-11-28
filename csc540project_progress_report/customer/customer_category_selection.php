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
    echo ("<h> Category - ".$category_name."<h><br>");
    echo ("<form action='#' method='POST'>");
    while ($row = mysqli_fetch_assoc($res)){
        echo "<div>".$row['item_name']."  -  Price: $".$row['item_price']."  -  Qty: ".$row['item_stock']."  <input name='qty_".$row['item_id']."'type='text' placeholder='Enter quantity'></div><br>";
    }
        echo("<input type='submit' value='Add to cart'>");
    echo ("</form>");

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
