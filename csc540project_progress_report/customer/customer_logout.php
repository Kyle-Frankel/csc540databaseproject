<?php
require "../connect/database.php";
session_start();
session_destroy();
header('Location: customer_portal.php');
?>