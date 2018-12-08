<?PHP
session_start();

if(empty($_SESSION['cart'])) {

    $_SESSION['cart'] = array();
}

if( isset($_POST['quantity']) )
{
    $quantity = (int)$_POST['quantity'];
    echo 'Quantity is: '.$quantity.'<br>';
}   else {
    echo "Quantity not received<br>";
}

if( isset($_POST['id']) )
{
    $item_id = (int)$_POST['id'];
    echo 'Item ID is: '.$item_id.'<br>';
}   else {
    echo "Item ID  not received<br>";
}

$addToCart = array($item_id=>$quantity);

if ($quantity > 0) {
    array_push($_SESSION['cart'], $addToCart);
} else {
    echo 'Please enter a quantity greater than 0<br>';
}

print_r(($_SESSION['cart']));

?>