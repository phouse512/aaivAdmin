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
                $(".img-circle").width($(".col-lg-3").width()-60);

                $(window).resize(function() {
                    $(".img-circle").width($(".col-lg-3").width()-60);
                });

                $("#logoutButton").click(function(event){
                    if($("#logoutButton").html() == "Sign In"){
                        window.location.replace("login.php");
                    } else {
                        logout();
                    }
                });

                $("#login").click(function(event){
                    window.location.replace("login.php");
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

        <?php
            if (!$_SESSION["valid_user"]) {
                // User not logged in, redirect to login page
                echo '        
                    <div class="row">
                        <div class="col-lg-9 col-lg-offset-1 verticalSpace">
                            <div style="padding-bottom: 65px; padding-top: 20px;" class="jumbotron">
                                <h2 style="color: #3F3F3F;">Welcome to the AAIV Attendance Manager!</h2>
                                <p class="text-muted" style="color: #5A5A5A;">Say goodbye to the old Google forms and tedious manual sorting! This manager will give you the tools and functions to keep up with following up without wasting time.</p>
                                <p><a id="login" class="btn btn-lg btn-success pull-right" href="#">Log in now</a></p>
                            </div>  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-lg-offset-1">
                            <div class="well">
                                <a href="#" class="">
                                    <img src="img/attendance.png" class="img-circle circle-shadow" width="240"  />
                                </a>
                                <div class="caption">
                                    <h4 class="centered">View Attendance</h4>
                                    <p>View attendance by event without any manual sorting! Sort and sift through the data to find target groups without wasting time.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="well">
                                <a href="#" class="">
                                    <img src="img/events.jpg" class="img-circle circle-shadow" width="240"  />
                                </a>
                                <div class="caption">
                                    <h4 class="centered">Manage Events</h4>
                                    <p>View all current events as well as add more as you need! All events are sorted by time so you can create them and edit them in any order.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="well">
                                <a href="#" class="">
                                    <img src="img/trends.jpg" class="img-circle circle-shadow" width="240"  />
                                </a>
                                <div class="caption">
                                    <h4 class="centered">See the Trends</h4>
                                    <p>Curious about who hasn\'t come in 2 weeks? Streaks of attendance are broken up in an easy to read, colorful manner to save you time.</p>
                                </div>
                            </div>
                        </div>
                    </div>';
            }
        ?>
        <div class="row">
            <div class="col-lg-9 col-lg-offset-1 verticalSpace">
                <div style="padding-bottom: 35px; padding-top: 20px;" class="jumbotron">
                    <h2 style="color: #3F3F3F;">Welcome to the AAIV Attendance Manager!</h2>
                    <p class="text-muted" style="color: #5A5A5A;">You're all logged in and part of the club now! Go explore and see what you can do, and if you need any ideas or tips on where to start, look below!</p>
                </div>  
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-1">
                <div class="media">
                    <a class="pull-left nolink" href="attendance.php">
                        <span class="media-object glyphicon glyphicon-list"></span>
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">View attendance</h4>
                        <p>Interested in viewing attendance for your latest event? The 'Manage Attendance' tab allows you to choose any event and view the attendance record. Interested? Navigate with the bar above or click on the icon on the left to get started.</p>
                    </div>
                </div>
                <div class="media">
                    <a class="pull-right nolink" href="events.php">
                        <span class="media-object glyphicon glyphicon-calendar"></span>
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">View events</h4>
                        <p>Do you have a new event that you'd like to track? The 'Manage Events' tab allows for you to create, modify, and delete events from the database. Beware though, deleting an event also deletes any attendance associated with it!</p>
                    </div>
                </div>
                <div class="media">
                    <a class="pull-left nolink" href="users.php">
                        <span class="media-object glyphicon glyphicon-user"></span>
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">View users</h4>
                        <p>Curious about somebody in your family group that you haven't seen in a while? Use the 'Manage Users' tab to search for attendance records by person and see a detailed list of their attendance for the past few weeks. Remember, no stalking!</p>
                    </div>
                </div>
                <div class="media">
                    <a class="pull-right nolink" href="trends.php">
                        <span class="media-object glyphicon glyphicon-sort-by-attributes"></span>
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">View trends</h4>
                        <p>Looking for the regulars, power-Focus-attendees, and maybe even the one-time visitors? Visit the 'View Trends' tab to look at the attendance streaks at any point in time: just select an event to see all the hard calculations done for you!</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>