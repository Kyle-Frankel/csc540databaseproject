<?php
require "../../connect/database.php";
session_start();
$user = $_SESSION['username'];
?>

<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/portal.css">
    <link rel="stylesheet" href="../../css/order.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>
<div class="row" id="logo_id">
    <div class="col-md-12 text-center">
        <img src="../images/EmployeePortal_Logo.png" ;>



    </div>
</div>

<body>
<div class="container">
    <div class="row">
        <ul class="nav nav-pills">
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="inventory.php"><span class="glyphicon glyphicon-tags"></span> Manage Inventory <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="baseball_cat.php">Baseball</a></li>
                    <li><a href="basketball_cat.php">Basketball</a></li>
                    <li><a href="football_cat.php">Football</a></li>
                    <li><a href="hockey_cat.php">Hockey</a></li>
                    <li><a href="soccer_cat.php">Soccer</a></li>
                    <li><a href="misc_cat.php">Miscellaneous</a></li>
                </ul>
            </li>
            <li><a href="../manage_order/order_management.php"><span class="glyphicon glyphicon glyphicon-search"></span> Review Orders</a></li>
            <li><a href="../login/logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
        </ul>
    </div>

    <div class="table-responsive">
        <h3 align="center"></h3><br />
        <div id="live_data"></div>
    </div>

    <div class="col-md-2 col-md-offset-6" id="cart-feedback-div">
    </div>
</div>
</body>
</html>

<script type="text/javascript" src="../libraries/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/modify_football.js"></script>
