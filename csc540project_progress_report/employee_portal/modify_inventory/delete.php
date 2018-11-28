<?php
require '../../connect/database.php';
$conn = getConnection();
$sql = "DELETE FROM csc540.item WHERE item_id = '".$_POST["item_id"]."'";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
