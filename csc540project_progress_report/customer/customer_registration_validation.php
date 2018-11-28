<?php
require "../connect/database.php";
require "../connect/DbHandler.php";

$newConnection = new DbHandler();
$conn = $newConnection->getConnection();

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

session_start();


$username = $_POST["username"];
$pw = password_hash($_POST["password"], PASSWORD_DEFAULT);
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$address = $_POST["address"];
$city = $_POST["city"];
$state = $_POST["state"];
$zipcode = $_POST["zipcode"];

// sql to create table
$sql = "INSERT INTO customer (username, password , first_name, last_name, address, city, state, zipcode)
VALUES ('$username', '$pw', '$firstname', '$lastname', '$address', '$city', '$state', $zipcode)";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
    echo "<br>";
    header("Location: customer_portal.php");
} else {
    echo "Error inserting data" . $sql ."<br>".$conn->error;
}

header('Location: customer_portal.php');
$conn->close();
?>