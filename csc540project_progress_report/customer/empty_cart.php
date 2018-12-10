<?php
session_start();
$_SESSION['cart'] = array();
header( 'Location: customer_home.php' );
?>