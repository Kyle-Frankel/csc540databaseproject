<?php
require '../../connect/database.php';
$conn = getConnection();
$item_id = $_POST["item_id"];
$text = $_POST["text"];
$column_name = $_POST["column_name"];
$sql = "UPDATE csc540.item SET ".$column_name."='".$text."' WHERE item_id='".$item_id."'";
if(mysqli_query($conn, $sql))
{
    echo 'Updated Successfully';
}
?>

