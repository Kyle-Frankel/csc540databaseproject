<?PHP
session_start();

if(empty($_SESSION['cart'])) {

    $_SESSION['cart'] = array();
}

if( isset($_POST['quantity']) )
{
    $quantity = $_POST['quantity'];
    echo 'Quantity is: '.$quantity.'<br>';
}   else {
    echo "Quantity not received<br>";
}

if( isset($_POST['id']) )
{
    $item_id = $_POST['id'];
    echo 'Item ID is: '.$item_id.'<br>';
}   else {
    echo "Item ID  not received<br>";
}

$addToCart = array($item_id=>$quantity);

$_SESSION['cart'][] = $addToCart;

var_dump($_SESSION['cart']);

?>