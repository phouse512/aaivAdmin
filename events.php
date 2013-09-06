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
                $('#editDatePicker').datepicker();

                $("#createEventButton").click(function(event){
                    event.preventDefault();
                    createEvent();
                });

                displayEventDelete();
                displayEventEdit();

                $("#deleteEventButton").click(function(event){
                    var eventID = $("tr.selectedEvent", "#tabs-pane3").attr("id");
                    if(typeof eventID != "undefined") {
                        var name = $("td.selectedEvent:eq(1)", "#tabs-pane3").html();
                        var date = $("td.selectedEvent:eq(2)", "#tabs-pane3").html();
                        $("#eventModalBody").html("<p>Are you sure you would like to delete the event <strong>'" + name + " " + date + "'</strong>? All changes are permanent and cannot be undone.</p>")
                        $("#eventDeleteModal").modal('show');
                    }   
                });

                $("#editEventButton").click(function(event){
                    var eventID = $("tr.selectedEvent", "#tabs-pane2").attr("id");
                    if(typeof eventID != "undefined") {
                        var name = $("td.selectedEvent:eq(1)", "#tabs-pane2").html();
                        var date = $("td.selectedEvent:eq(2)", "#tabs-pane2").html();
                        $("#editEventName").val(name);
                        $("#editDatePicker").val(date);
                        $("#eventEditModal").modal('show');
                    }
                });

                $("#buttonDeleteEvent").click(function(event){
                    deleteSelectedEvent();
                });

                $("#buttonEditEvent").click(function(event){
                    editSelectedEvent();
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
                <li><a href="trends.php">View Trends</a></li>
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
                            
                            <a id="createClose" class="close" href="#">&times;</a>
                        </div>

                    </div>
                </div>

                <div class="tab-pane" id="tabs-pane2">
                    <div class="col-lg-6">
                        <div id="eventSelectEdit" class="verticalSpace3 centered container well">
                            <div class="col-lg-10 col-lg-offset-1">
                                <button id="editEventButton" type="submit" class="btn btn-primary btn-lg pull-right">Edit Event</button>
                            </div>
                        </div>
                        <div id="eventEditSuccess" class="alert alert-success fade verticalSpace">
                            
                            <a id="editClose" class="close" href="#">&times;</a>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="tabs-pane3">
                    <div class="col-lg-6">
                        <div id="eventSelectDelete" class="verticalSpace3 centered container well">
                            <div class="col-lg-10 col-lg-offset-1">
                                <button id="deleteEventButton" type="submit" class="btn btn-danger btn-lg pull-right">Delete Event</button>
                            </div>
                        </div>
                        <div id="eventDeleteSuccess" class="alert alert-success fade verticalSpace">
                            
                            <a id="deleteClose" class="close" href="#">&times;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="eventDeleteModal">
            <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Confirm</h4>
                  </div>
                  <div class="modal-body" id="eventModalBody">
                    <p>Are you sure you would like to delete the event? Changes are permanent and cannot be undone.</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="buttonDeleteEvent">Delete Event</button>
                  </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade" id="eventEditModal">
            <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Event</h4>
                  </div>
                  <div class="modal-body" id="eventEditModalBody">
                        <form class="form-horizontal">
                                <div id="eventName" class="form-group verticalSpace">
                                    <div class="col-lg-6 col-lg-offset-1">
                                        <label>Event Name:</label>
                                        <input type="text" class="form-control" id="editEventName" placeholder="event name..">
                                    </div>
                                </div>
                                <div id="eventDate" class="form-group verticalSpace">
                                    <div class="col-lg-6 col-lg-offset-1">
                                        <label>Event Date:</label>
                                        <input type="text" class="span2 form-control" placeholder="event date.." data-date-format="yyyy-mm-dd" id="editDatePicker" >
                                    </div>
                                </div>
                            </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="buttonEditEvent">Save Changes</button>
                  </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </body>
</html>