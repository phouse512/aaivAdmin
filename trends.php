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
        <link href="css/trends.css" rel="stylesheet" media="screen">
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="js/source.js"></script>
        <script src="js/raphael-min.js.sdx"></script>
        <script src="js/trend_gui.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>

        <script>
            $(document).ready(function() {
                setLogout();
                $("#logoutButton").click(function(event){
                    logout();
                });
                setPanelOffsets();
                circleListeners();
                circlePopups();

                $('[data-toggle="modal"]').click(function(e) {
                    e.preventDefault();
                    displayModalEvents();
                });

                $('#buttonChooseEvent').click(function(e) {
                    var eventID = $("tr.selectedEvent").attr("id");
                    getStreakData(eventID);
                    clearSelectedPanels();
                    $('#eventModal').modal('toggle');
                });

                $('#eventModal').on('hidden.bs.modal', function () {
                    setTimeout(function () {
                        setPanelOffsets();
                    }, 500);
                });
            });
        </script>
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <a class="navbar-brand" href="./">AAIV Attendance</a>
            <ul class="nav navbar-nav">
                <li><a href="attendance.php">Manage Attendance</a></li>
                <li><a href="events.php">Manage Events</a></li>
                <li><a href="users.php">Manage Users</a></li>
                <li class="active"><a href="#">View Trends</a></li>
            </ul>
            <button id="logoutButton" type="button" class="btn btn-default navbar-btn pull-right">Sign In</button>
        </div>
        <div class="row verticalSpace2">
            <div class="col-lg-4 col-lg-offset-4">
                <p class="trendsHeading">Event: None Selected</p>
            </div>
            <div class="col-lg-4 pull-right">
                <a data-toggle="modal" href="#eventModal" class="btn-large pull-right btn btn-primary">choose event..</a> 
            </div>
        </div>
        <div class="row">
            <div id="group0" class="col-lg-1 col-lg-offset-1">
                <div id="circle1" data-toggle="tooltip" data-placement="top" title="Current Number"><div class="indicators-single">-6</div></div>
            </div>
            <div id="group1" class="col-lg-1">
                <div id="circle2" data-toggle="tooltip" title="20 Users"><div class="indicators-multiple">-5 to 3</div></div>
            </div>
            <div id="group2" class="col-lg-1">
                <div id="circle3" data-toggle="tooltip" title="12 Users"><div class="indicators-single">-2</div></div>
            </div>
            <div id="group3" class="col-lg-1">
                <div id="circle4" data-toggle="tooltip" title="8 Users"><div class="indicators-single">-1</div></div>
            </div>
            <div id="group-new" class="col-lg-1">
                <div id="circle-new" data-toggle="tooltip" title="10 Users"><div class="indicators-new">NEW</div></div>
            </div>
            <div id="group4" class="col-lg-1">
                <div id="circle5" data-toggle="tooltip" title="0 Users"><div class="indicators-single">+1</div></div>
            </div>
            <div id="group5" class="col-lg-1">
                <div id="circle6" data-toggle="tooltip" title="2 Users"><div class="indicators-single">+2</div></div>
            </div>
            <div id="group6" class="col-lg-1">
                <div id="circle7" data-toggle="tooltip" title="10 Users"><div class="indicators-multiple">+3 to 5</div></div>
            </div>
            <div id="group7" class="col-lg-1">
                <div id="circle8" data-toggle="tooltip" title="3 Users"><div class="indicators-single">6+</div></div>
            </div>
        </div>
 
        <div class="panel1 offset panel-notselected left-side">
            <div class="panel panel-default removeBottomMargin">
                <div class="panel-heading"><strong>Attendance Streak:</strong> 6 or more missed events</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Year</th>
                            <th>Email</th>
                            <th>Dorm</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>    
                            <td>2</td>
                            <td>House</td>
                            <td>Phil</td>
                            <td>Junior</td>
                            <td>philhosue</td>
                            <td>Sargent</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>            
        <div class="panel2 offset panel-notselected left-side">
            <div class="panel panel-default removeBottomMargin">
                <div class="panel-heading"><strong>Attendance Streak:</strong> between 3 and 5 missed events</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Year</th>
                            <th>Email</th>
                            <th>Dorm</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>    
                            <td>2</td>
                            <td>House</td>
                            <td>Phil</td>
                            <td>Junior</td>
                            <td>philhosue</td>
                            <td>Sargent</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel3 offset panel-notselected left-side">
            <div class="panel panel-default removeBottomMargin">
                <div class="panel-heading"><strong>Attendance Streak:</strong> 2 missed events</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Year</th>
                            <th>Email</th>
                            <th>Dorm</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>    
                            <td>2</td>
                            <td>House</td>
                            <td>Phil</td>
                            <td>Junior</td>
                            <td>philhosue</td>
                            <td>Sargent</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel4 offset panel-notselected left-side">
            <div class="panel panel-default removeBottomMargin">
                <div class="panel-heading"><strong>Attendance Streak:</strong> 1 missed event</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Year</th>
                            <th>Email</th>
                            <th>Dorm</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>    
                            <td>2</td>
                            <td>House</td>
                            <td>Phil</td>
                            <td>Junior</td>
                            <td>philhosue</td>
                            <td>Sargent</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel5 offset panel-notselected right-side">
            <div class="panel panel-default removeBottomMargin">
                <div class="panel-heading"><strong>Attendance Streak:</strong> 1 attended</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Year</th>
                            <th>Email</th>
                            <th>Dorm</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>    
                            <td>2</td>
                            <td>House</td>
                            <td>Phil</td>
                            <td>Junior</td>
                            <td>philhosue</td>
                            <td>Sargent</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel6 offset panel-notselected right-side">
            <div class="panel panel-default removeBottomMargin">
                <div class="panel-heading"><strong>Attendance Streak:</strong> 2 events attended</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Year</th>
                            <th>Email</th>
                            <th>Dorm</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>    
                            <td>2</td>
                            <td>House</td>
                            <td>Phil</td>
                            <td>Junior</td>
                            <td>philhosue</td>
                            <td>Sargent</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="panel7 offset panel-notselected right-side">
            <div class="panel panel-default removeBottomMargin">
                <div class="panel-heading"><strong>Attendance Streak:</strong> 3 to 5 attended events</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Year</th>
                            <th>Email</th>
                            <th>Dorm</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>    
                            <td>2</td>
                            <td>House</td>
                            <td>Phil</td>
                            <td>Junior</td>
                            <td>philhosue</td>
                            <td>Sargent</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel8 offset panel-notselected right-side">
            <div class="panel panel-default removeBottomMargin">
                <div class="panel-heading"><strong>Attendance Streak:</strong> 6 or more attended events aka "the regulars"</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Year</th>
                            <th>Email</th>
                            <th>Dorm</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>    
                            <td>2</td>
                            <td>House</td>
                            <td>Phil</td>
                            <td>Junior</td>
                            <td>philhosue</td>
                            <td>Sargent</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel-new offset panel-notselected new">
            <div class="panel panel-default removeBottomMargin">
                <div class="panel-heading"><strong>Newcomers:</strong> talk to these peeps</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Year</th>
                            <th>Email</th>
                            <th>Dorm</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>    
                            <td>2</td>
                            <td>House</td>
                            <td>Phil</td>
                            <td>Junior</td>
                            <td>philhosue</td>
                            <td>Sargent</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal fade" id="eventModal">
            <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">choose event..</h4>
                  </div>
                  <div class="modal-body" id="eventModalBody">
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="buttonChooseEvent">Select Event</button>
                  </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </body>
</html>