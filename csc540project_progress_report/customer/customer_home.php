<?php
require "../connect/database.php";
require "../connect/DbHandler.php";

$newConnection = new DbHandler();
$conn = $newConnection->getConnection();

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $welcome_message = "Welcome {$_SESSION['username']}";
    echo ($welcome_message);
}

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
        <nav class="navbar fixed-top navbar-dark bg-dark">
            <span class="navbar-brand"><img src="../images/sperts.png" width="45" height="45">Sports and more</span>

                 <form action="customer_category_selection.php" method="POST" >
                     <select name="category_selector" onchange="this.form.submit()">
                        <?php
                            $sql = "SELECT cat_name FROM category";
                            $res = mysqli_query($conn, $sql);
                            $conn->close();
                            while ($row = mysqli_fetch_assoc($res)){
                                echo "<option class='dropdown-item' href='#'>".$row['cat_name']."</option>";
                                }
                        ?>
                     </select>
                 </form>

            <form>
                <button type="button" id="review_button" value="Logout" onclick="window.location.href='customer_order_review.php'">Review orders</button>
            </form>

            <form>
                <button type="button" id="logout_button" value="Logout" onclick="window.location.href='customer_logout.php'">Logout</button>
            </form>
        </nav>
    </div>

    <div id="welcome">
        <?php echo $welcome_message?>
    </div>

    <div id="items">Your items will be listed here</div>




<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="customer_home.js"></script>
</body>




</html>

