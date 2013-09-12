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
            <link rel="stylesheet" href="css/bootstrap-glyphicons.css"></link>
            <script src="http://code.jquery.com/jquery.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/source.js"></script>

            <script>
                $(document).ready(function() 
{                    setLogout();
                    $("#logoutButton").click(function(event){
                        logout();
                    });

                    $("#searchUsers").click(function(event){
                        paginationSearch($("#searchUserInput").val(), 1, 10);
                    });

                    $("#searchUserInput").keypress(function(event){
                        if(event.keyCode == 13) {
                            paginationSearch($("#searchUserInput").val(), 1, 10);
                        }
                    })

                    paginationSearch("", 1, 10);
                });
            </script>
        </head>
        
        <body>
            <div class="navbar navbar-fixed-top">
<<<<<<< HEAD
                <a class="navbar-brand" href="./">AAIV Attendance</a>
=======
                <a class="navbar-brand" href="#">AAIV Attendance</a>
>>>>>>> 246ed2ab175400add39c04505cb1fcbc7f70a2ab
                <ul class="nav navbar-nav">
                    <li><a href="attendance.php">Manage Attendance</a></li>
                    <li><a href="events.php">Manage Events</a></li>
                    <li class="active"><a href="#">Manage Users</a></li>
                    <li><a href="trends.php">View Trends</a></li>
                </ul>
                <button id="logoutButton" type="button" class="btn btn-default navbar-btn pull-right">Sign In</button>
            </div>
            
            <div class="row">
                <div class="col-lg-2">
                    <ul class="nav nav-pills nav-stacked verticalSpace3">
                        <li class="active"><a href="#tabs-pane1" data-toggle="tab">Create New User</a></li>
                        <li><a href="#tabs-pane2" data-toggle="tab">View Users</a></li>
                        <li><a href="#tabs-pane3" data-toggle="tab">Delete User</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="tabs-pane1">
                        <div class="col-lg-10">

                        </div>
                    </div>

                    <div class="tab-pane" id="tabs-pane2">
                        <div class="col-lg-10">
                            <div class="row verticalSpace">
                                <div class="col-lg-2">
                                    <h4>Users</h4>
                                </div>
                                <div class="col-lg-4 pull-right">
                                    <div class="input-group">
                                        <input id="searchUserInput" type="text" class="form-control">
                                        <span class="input-group-btn">
                                            <button id="searchUsers" class="btn btn-default" type="button">Search</button>
                                        </span>
                                    </div><!-- /input-group -->
                                </div>
                            </div>
                            <div class="row verticalSpace">
                                <div id="searchData" class="col-lg-10">
                                    <table class="table table-hover">
                                        <thead>
                                            <th>Last Name</th>
                                            <th>First Name</th>
                                            <th>Year</th>
                                            <th>Email</th>
                                            <th>Dorm</th>
                                        </thead>
                                        <tbody id="searchUsersResult">

                                        </tbody>
                                    </table>
                                    <div id="paginationUI" class="centered">

                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                    </div>

                    <div class="tab-pane" id="tabs-pane3">
                        <div class="col-lg-6">

                        </div>
                    </div>
                </div>

            </div> 

        </body>
    </html>