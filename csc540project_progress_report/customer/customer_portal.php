<?php

require   "../connect/database.php";

session_start();

?>

    <html lang="en" xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../css/home.css" type="text/css"/>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <title>SPORTS R US</title>

    </head>

    <body>

    <div class="container">
        <div class="row" id="logo_id">
            <div class="col-md-12 text-center">
                <img src = "../images/sportsrus.png">

            </div>
        </div>
        <div id="login_form_wrapper">
            <div class="row text-center">
                <form action="customer_login_validation.php" method="POST">
                    <div class="row" style="margin-top: 50px;">
                        <div class="col-md-12">
                            Username: <input id="customer_username" type="text" name="username">


                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12" id ="password_text">
                            Password:   <input id="customer_password" type="password" name="password">

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <input id="login_button" class="btn btn-secondary" type="button" value="Log In" name="submit">

                        </div>

                    </div>
                </form>
            </div>
        </div>
        <div id="feedback_display" class="row text-center">
        </div>
        <div class="row text-center">
            <div class="col-md-12" id="signUp">
                New Customer? Register yourself  <a href="customer_registration.php">here!</a>
            </div>
        </div>
    </div>




    </body>

    </html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="customer_portal.js"></script>
