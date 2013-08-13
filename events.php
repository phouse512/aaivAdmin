<?php
    session_start();

    if (!$_SESSION["valid_user"]) {
        // User not logged in, redirect to login page
        Header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>AAIV Attendance</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="css/style.css" rel="stylesheet" media="screen">
        <link href="css/datepicker.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="css/bootstrap-glyphicons.css"></link>
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="js/source.js"></script>

        <script>
            $(document).ready(function() {
                setLogout();
                $("#logoutButton").click(function(event){
                    logout();
                });

                $('#datePicker').datepicker();

                $("#createEventButton").click(function(event){
                    event.preventDefault();
                    createEvent();
                });
            });
        </script>
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <a class="navbar-brand" href="#">AAIV Attendance</a>
            <ul class="nav navbar-nav">
                <li><a href="attendance.php">Manage Attendance</a></li>
                <li class="active"><a href="#">Manage Events</a></li>
                <li><a href="users.php">Manage Users</a></li>
            </ul>
            <button id="logoutButton" type="button" class="btn btn-default navbar-btn pull-right">Sign In</button>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <ul class="nav nav-pills nav-stacked verticalSpace3">
                    <li class="active"><a href="#tabs-pane1" data-toggle="tab">Create New Event</a></li>
                    <li><a href="#tabs-pane2" data-toggle="tab">Edit Events</a></li>
                    <li><a href="#tabs-pane3" data-toggle="tab">Delete Event</a></li>
                </ul>

            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="tabs-pane1">
                    <div class="col-lg-6">
                        <div class="centered container">
                            <form class="form-horizontal well verticalSpace3">
                               
                                <p class="lead text-left">Create New Event</p>
                                <hr>
                                <div id="eventName" class="form-group verticalSpace">
                                    <div class="col-lg-6 col-lg-offset-1">
                                        <input type="text" class="form-control" id="inputEventName" placeholder="event name..">
                                    </div>
                                </div>
                                <div id="eventDate" class="form-group verticalSpace">
                                    <div class="col-lg-6 col-lg-offset-1">
                                        <input type="text" class="span2 form-control" placeholder="event date.." data-date-format="yyyy-mm-dd" id="datePicker" >
                                    </div>
                                </div>

                                <div class="form-group verticalSpace">
                                    <div class="col-lg-10 col-lg-offset-1">
                                        <button id="createEventButton" type="submit" class="btn btn-primary btn-lg pull-right">Create New Event</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div id="eventInsertSuccess" class="alert alert-success fade verticalSpace">
                            
                            <a class="close" href="#">&times;</a>
                        </div>

                    </div>
                </div>

                <div class="tab-pane" id="tabs-pane2">
                    hi
                </div>

                <div class="tab-pane" id="tabs-pane3">
                    under construction
                </div>
            </div>
        </div>
    </body>
</html>