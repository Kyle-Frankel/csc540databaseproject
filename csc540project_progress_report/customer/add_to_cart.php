<?PHP
require "../connect/database.php";
require "../connect/DbHandler.php";
header('Cache-Control: no cache');
session_cache_limiter('private_no_expire');
session_start();

if(empty($_SESSION['cart'])) {

    $_SESSION['cart'] = array();
}

if( isset($_POST['quantity']) )
{
    $quantity = (int)$_POST['quantity'];

}   else {
    echo "Quantity not received<br>";
}

if( isset($_POST['id']) )
{
    $item_id = (int)$_POST['id'];
}   else {
    echo "Item ID  not received<br>";
}

if ($quantity > 0) {
    $_SESSION['cart'][] = array($item_id=>$quantity);
} else {
    echo 'Please choose a quantity greater than 0<br>';
}
echo("<div>This be your shopping cart and shit</div>");
echo('<br>');

$newConnection = new DbHandler();
$conn = $newConnection->getConnection();

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
$total = 0;
foreach($_SESSION['cart'] AS $arrayIndex){
    foreach($arrayIndex AS $id=>$qty) {
        $sql_name = "SELECT item_name FROM item WHERE item_id = '$id'";
        $res_name = mysqli_query($conn, $sql_name);
        $row_name = mysqli_fetch_assoc($res_name);
        $name = $row_name['item_name'];
        $sql_price = "SELECT item_price FROM item WHERE item_id = '$id'";
        $res_price = mysqli_query($conn, $sql_price);
        $row_price = mysqli_fetch_assoc($res_price);
        $price = $row_price['item_price'];
        $price_per_item = $price * $qty;
        $total += $price_per_item;
        echo("
            <div>Item name: ".$name."</div>
            <div>Price: $".$price."</div>
            <div>Qty: ".$qty."</div>
            <div>Subtotal: $".$price_per_item."</div><br>

        ");

    }

}
echo("<div>TOTAL: $".$total."</div>");
echo'
        <div><button onclick="history.go(-1)">Continue shopping</button></div>
        <div><button value="Complete Order" onclick=window.location.href="complete_order.php">Complete Order</button></div>
        <div><button value="Empty Cart" onclick=window.location.href="complete_order.php">Empty Cart</button></div>
'
?>