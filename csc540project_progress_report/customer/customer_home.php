<?php
require "../connect/database.php";
require "../connect/DbHandler.php";
$newConnection = new DbHandler();
$conn = $newConnection->getConnection();
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
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
    <title>Customer Home</title>
</head>

<body>

<div class="container">
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand"><img src="../images/sperts.png" width="45" height="45">Sports and more</span>
        <div id="welcome">
            <?php if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                $welcome_message = "Welcome {$_SESSION['username']}";
                echo ($welcome_message);
            }?>
        </div>

        <form action="customer_home.php" method="POST" >
            <select name="category_selector" onchange="this.form.submit()">
                <?php
                $sql = "SELECT cat_name FROM category";
                $res = mysqli_query($conn, $sql);
                $conn->close();
                echo "<option selected disabled hidden>Category</option>";
                while ($row = mysqli_fetch_assoc($res)){
                    echo "<option class='dropdown_item' href='#'>".$row['cat_name']."</option>";
                }
                ?>
            </select>
        </form>

        <div id="cart_pic">
            <img src="../images/cart.png" width="45" height="45">
        </div>

        <div>
            <button type="button" id="review_button" value="review_order" onclick="window.location.href='customer_order_review.php'">Review orders</button>
        </div>

        <div>
            <button type="button" id="logout_button" value="Logout" onclick="window.location.href='customer_logout.php'">Logout</button>
        </div>
    </nav>
</div>



<div class="table-responsive">
    <h3 align="center"></h3><br />
    <div id="live_data"></div>
</div>

<?php
$newConnection1 = new DbHandler();
$conn2 = $newConnection1->getConnection();
if (isset($_POST["category_selector"])) {
    $category_name = $_POST["category_selector"];
    $sql = "SELECT item_name, item_price, item_stock, item_id FROM item NATURAL JOIN category WHERE cat_name = '$category_name'";
    $res = mysqli_query($conn2, $sql);
    $conn2->close();
    echo (' 
      <div class="table-responsive">
      ');
    while ($row = mysqli_fetch_assoc($res)){
        echo("
                <form action='add_to_cart.php' method='POST'>
                        <div class='item_name'>".$row['item_name']."</div>
                        <div class='item_price'>$".$row['item_price']."</div>
                        <div class='item_stock'>Qty: ".$row['item_stock']."</div>
                        <div class='order_amount'><input type='number' name='quantity' min='0' max='".$row['item_stock']."'placeholder='0'><input type='hidden' name='id' value='".$row['item_id']."'><input type='submit' value='Add to cart'></div>
                </form>
              ");
    }
    echo("         
        </div>
");
} else {
    $category_name = null;

}
?>




<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="customer_home.js"></script>
</body>




</html>