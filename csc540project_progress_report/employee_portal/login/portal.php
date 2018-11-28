<?php
require "../../connect/database.php";
session_start();


$conn = getConnection();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "Logged in as {$_SESSION['username']}";
}


$conn->close();
?>


<html>
<head>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../css/portal.css">
        <script type="text/javascript" src="../../libraries/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



    </head>
</head>
<body>
<div class="row" id="logo_id">
    <div class="col-md-12 text-center">
        <img src="../images/EmployeePortal_Logo.png">



    </div>
</div>
<div class="container">
    <div class="row">
        <ul class="nav nav-pills">
            <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="../modify_inventory/inventory.php">
                        <span class="glyphicon glyphicon-tags"></span> Manage Inventory <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="../modify_inventory/baseball_cat.php">Baseball</a></li>
                    <li><a href="../modify_inventory/basketball_cat.php">Basketball</a></li>
                    <li><a href="../modify_inventory/football_cat.php">Football</a></li>
                    <li><a href="../modify_inventory/hockey_cat.php">Hockey</a></li>
                    <li><a href="../modify_inventory/soccer_cat.php">Soccer</a></li>
                    <li><a href="../modify_inventory/misc_cat.php">Miscellaneous</a></li>
                </ul>
            </li>
            <li><a href=""><span class="glyphicon glyphicon-shopping-cart"></span> Manage Orders</a></li>
            <li><a href="../login/logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
        </ul>
    </div>
    <div class="row" id="welcome-row">
        <h1>Welcome.</h1>
    </div>
    <div class="row" id="info-div">
        <h3>Click one of the options above.</h3>
    </div>
</div>
</body>
</html>


</html>




