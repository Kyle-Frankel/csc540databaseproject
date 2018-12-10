<?PHP
require "../connect/database.php";
require "../connect/DbHandler.php";
header('Cache-Control: no cache');
session_cache_limiter('private_no_expire');
session_start();
$user_id = $_SESSION['userid'];
$date = date('Y-m-d');
$newConnection = new DbHandler();
$conn = $newConnection->getConnection();
$current_orderID;
$sql_create_order = "INSERT INTO customer_order (customer_id, order_date)
VALUES ('$user_id', '$date')";
if ($conn->query($sql_create_order) === TRUE) {
    $current_orderID = $conn->insert_id;
    $total = 0;
    foreach($_SESSION['cart'] AS $arrayIndex){
        foreach($arrayIndex AS $id=>$qty) {
            $sql_order_detail_insert = "INSERT INTO order_details (order_id, item_id, quantity)
            VALUES ('$current_orderID', '$id', '$qty')";
            $sql_subtract_stock = "UPDATE item SET item_stock = item_stock - '$qty'";
            $conn->query($sql_order_detail_insert);
            $conn->query($sql_subtract_stock);
        }
    }
    echo "Congratulations, your order has been submitted";
    $conn->close();
    $_SESSION['cart'] = array();
} else {
    echo "Error inserting data" . $sql_create_order ."<br>".$conn->error;
}
echo('
<div><button value="Home" onclick=window.location.href="customer_home.php">Home</button></div>
    ');
?>
