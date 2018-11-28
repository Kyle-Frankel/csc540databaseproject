<?php
require '../../connect/database.php';
$conn = getConnection();

$value1 = $_POST["item_name"];
$value2 = $_POST["item_price"];
$value3 = $_POST["item_stock"];
$value4 = $_POST["cat_id"];


$sql = "insert into csc540.item (item_name, item_price, item_stock, cat_id) values ('$value1' , '$value2', '$value3', '$value4')";
if ($conn->query($sql) === TRUE) {
    echo 'Data Updated';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


?>

