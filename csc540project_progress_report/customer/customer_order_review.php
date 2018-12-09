<?php
require "../connect/database.php";
require "../connect/DbHandler.php";
header('Cache-Control: no cache');
session_cache_limiter('private_no_expire');
session_start();
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/customer_home.css" type="text/css" />
    <title>Order Review</title>
</head>

<body>

    <div class="container">
        <nav class="navbar fixed-top navbar-dark bg-dark">
            <span class="navbar-brand"><img src="../images/sperts.png" width="45" height="45">Sports and more</span>
            <span class="navbar-brand">Order Review</span>
        </nav>
    </div>

    <div>
        <p id="items">List of items</p>
    </div>

    <form>
        <button type="button" id="review_button" value="Logout" onclick="window.location.href='customer_home.php'">Back</button>
    </form>

<?php
$user_id = $_SESSION['userid'];

$sql = "SELECT order_id, item_name, quantity, date FROM customer NATURAL JOIN customer_order NATURAL JOIN order_details NATURAL JOIN item
where customer_id = '$user_id' GROUP BY order_id";

$newConnection = new DbHandler();
$conn = $newConnection->getConnection();

$res = mysqli_query($conn,$sql);

?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity=
</body>

</html>
