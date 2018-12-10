<?php

?>

<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../../css/invoice.css" type="text/css"/>

</head>


<div class="row" id="logo_id">
    <div class="col-md-12 text-center">
        <img src="../../images/sportsrus.png">
        <div class="col-md-12 text-center">
            <p>123 Fake Street</p>
            <p>New Haven, CT</p>
            <p>867-5309</p>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>


</div>

<body>
<div class="container">
    <div class="row">
        <ul class="nav nav-pills">
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="../modify_inventory/inventory.php"><span class="glyphicon glyphicon-tags"></span> Manage Inventory <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="../modify_inventory/baseball_cat.php">Baseball</a></li>
                    <li><a href="../modify_inventory/basketball_cat.php">Basketball</a></li>
                    <li><a href="../modify_inventory/football_cat.php">Football</a></li>
                    <li><a href="../modify_inventory/hockey_cat.php">Hockey</a></li>
                    <li><a href="../modify_inventory/soccer_cat.php">Soccer</a></li>
                    <li><a href="../modify_inventory/misc_cat.php">Miscellaneous</a></li>
                </ul>
            </li>
            <li><a href=""><span class="glyphicon glyphicon glyphicon-search"></span> Review Orders</a></li>
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
<script type="text/javascript" src="modify_manage.js"></script>
