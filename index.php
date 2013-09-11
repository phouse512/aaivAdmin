<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <script src="http://code.jquery.com/jquery.js"></script>
        <title>AAIV Attendance</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="css/style.css" rel="stylesheet" media="screen">
        <link href="css/datepicker.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="css/bootstrap-glyphicons.css"></link>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="js/source.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>

        <?php
            if ($_SESSION["valid_user"]) {
                // User not logged in, redirect to login page
                echo "<script>$(document).ready(function() { setLogout(); });</script>";
            }
        ?>

        <script>
            $(document).ready(function() {
                $("#logoutButton").click(function(event){
                    if($("#logoutButton").html() == "Sign In"){
                        window.location.replace("login.php");
                    } else {
                        logout();
                    }
                });
            });
        </script>
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <a class="navbar-brand" href="index.php">AAIV Attendance</a>
            <ul class="nav navbar-nav">
                <li><a href="attendance.php">Manage Attendance</a></li>
                <li><a href="events.php">Manage Events</a></li>
                <li><a href="users.php">Manage Users</a></li>
                <li><a href="trends.php">View Trends</a></li>
            </ul>
            <button id="logoutButton" type="button" class="btn btn-default navbar-btn pull-right">Sign In</button>
        </div>
        <div class="row">
            <div class="col-lg-8 center verticalSpace3">
                <div style="padding-bottom: 75px;" class="jumbotron">
                    <h2 style="color: #3F3F3F;">Welcome to the AAIV Attendance Manager!</h2>
                    <p class="text-muted" style="color: #5A5A5A;">Say goodbye to the old Google forms and tedious manual sorting! This manager will give you the tools and functions to keep up with following up without wasting time.</p>
                    <p><a class="btn btn-lg btn-success pull-right verticalSpace" href="#">Log in now</a></p>
                </div>  
            </div>
        </div>
    </body>
</html>