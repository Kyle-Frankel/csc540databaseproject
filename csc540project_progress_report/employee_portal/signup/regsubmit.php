<?php
require "../../connect/database.php";
require "../../connect/DbHandler.php";

$newConnection = new DbHandler();
$conn = $newConnection->getConnection();
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

session_start();
$username = $_POST["username"];
$pw = password_hash($_POST["password"], PASSWORD_DEFAULT);
$value3 = $_POST["firstname"];
$value4 = $_POST["lastname"];



// sql to create table
$sql = "INSERT INTO employee (username, password , first_name, last_name)
VALUES ('$username', '$pw', '$value3', '$value4')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
	echo "<br>";
} else {
    echo "Error inserting data" . $conn->error;
}

header('Location: ../login/login.php');

$conn->close();


?>