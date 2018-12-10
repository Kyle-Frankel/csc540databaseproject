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
    echo "Item ID not received<br>";
}

$incart = FALSE;
$zero = FALSE;

foreach($_SESSION['cart'] AS $arrayIndex) {
    foreach ($arrayIndex AS $id => $qty) {
        if ($item_id == $id) {
            $incart = TRUE;
            echo("<div>This item is already in your cart, please choose another item");
        }

    }

}

if ($quantity <= 0) {
    $zero = TRUE;
    echo 'Please choose a quantity greater than 0<br>';
}

if ($incart == FALSE & $zero == FALSE ) {
    $_SESSION['cart'][] = array($item_id => $quantity);
    echo("<div>Your Shopping Cart</div>");
    echo('<br>');

    $newConnection = new DbHandler();
    $conn = $newConnection->getConnection();
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    $total = 0;
    foreach ($_SESSION['cart'] AS $array) {
        foreach ($array AS $id1 => $qty) {
            $sql_name = "SELECT item_name FROM item WHERE item_id = '$id1'";
            $res_name = mysqli_query($conn, $sql_name);
            $row_name = mysqli_fetch_assoc($res_name);
            $name = $row_name['item_name'];
            $sql_price = "SELECT item_price FROM item WHERE item_id = '$id1'";
            $res_price = mysqli_query($conn, $sql_price);
            $row_price = mysqli_fetch_assoc($res_price);
            $price = $row_price['item_price'];
            $price_per_item = $price * $qty;
            $total += $price_per_item;
            echo("
                        <div>Item name: " . $name . "</div>
                        <div>Price: $" . $price . "</div>
                        <div>Qty: " . $qty . "</div>
                        <div>Subtotal: $" . $price_per_item . "</div><br>
                ");
        }


    }
    echo("<div>TOTAL: $" . $total . "</div>");
    $conn->close();
}

echo'
        <div><button onclick="history.go(-1)">Continue shopping</button></div>
        <div><button value="Complete Order" onclick=window.location.href="complete_order.php">Complete Order</button></div>
        <div><button value="Empty Cart" onclick=window.location.href="empty_cart.php">Empty Cart</button></div>
'
?>