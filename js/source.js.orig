var sortOption = 0;
var eventID;

function displayModalEvents(){
      $.ajax({
            url: 'script/eventListModal.php',
            type: 'GET',
            success: function(data, textStatus, xhr){
                  var tableLocation = $('#eventModalBody');
<<<<<<< HEAD
                  $("table", tableLocation).remove();
                  displayEventsTable(tableLocation, data);
                  listenerLocation = $("#selectEvent", tableLocation);
                  addEventTableListener(listenerLocation);
=======
                  displayEventsTable(tableLocation, data);
>>>>>>> a93351d8a1dfce359288d972ec6b378b8f6df965
            },
            error: function(xhr, textStatus, errorThrown){
                  alert(textStatus);
            }
      });
}

function displayEventDelete(){
      $.ajax({
            url: 'script/eventListModal.php',
            type: 'GET',
            success: function(data, textStatus, xhr){
                  var tableLocation = $('#eventSelectDelete');
                  $("table", tableLocation).remove();
                  displayEventsTable(tableLocation, data);
<<<<<<< HEAD
                  listenerLocation = $("#selectEvent", tableLocation);
                  addEventTableListener(listenerLocation);
=======
>>>>>>> a93351d8a1dfce359288d972ec6b378b8f6df965
            },
            error: function(xhr, textStatus, errorThrown){
                  alert(textStatus);
            }
      });
}

<<<<<<< HEAD
function displayEventEdit(){
      $.ajax({
            url: 'script/eventListModal.php',
            type: 'GET',
            success: function(data, textStatus, xhr){
                  var tableLocation = $('#eventSelectEdit');
                  $("table", tableLocation).remove();
                  displayEventsTable(tableLocation, data);
                  listenerLocation = $("#selectEvent", tableLocation);
                  addEventTableListener(listenerLocation);
            },
            error: function(xhr, textStatus, errorThrown){
                  alert(textStatus);
            }
      })
}

=======
>>>>>>> a93351d8a1dfce359288d972ec6b378b8f6df965
function displayEventsTable(tableLocation, data){
      var events = data.getElementsByTagName("event");
      var tableHTML = '<table class ="table table-hover"> <thead> <tr> <th>#</th><th>Event</th><th>Date</th></tr></thead><tbody id="selectEvent">';
      var current = 0;
      
      for(var i=0;i<events.length; i++){
            event_ID = events[i].getElementsByTagName("event_id")[0].textContent;
            name = events[i].getElementsByTagName("event_name")[0].textContent;
            date = events[i].getElementsByTagName("event_date")[0].textContent;
            current = i+1;
            tableHTML += '<tr id="' + event_ID + '"><td>' + current + '</td><td>' + name + '</td><td>' + date + '</td></tr>';
      }

      tableHTML += '</tbody></table>';

      $(tableLocation).prepend(tableHTML);
<<<<<<< HEAD
}

function addEventTableListener(divLocation){
      $(divLocation).delegate("tr", "click", function(){
=======

      $("#selectEvent").delegate("tr", "click", function(){
>>>>>>> a93351d8a1dfce359288d972ec6b378b8f6df965
            if ($(this).children(".selectedEvent")[0]) {
                  $(".selectedEvent").removeClass('selectedEvent');
                  $(".hasRowSpan").removeClass('hasRowSpan');   
            } else if ($(".selectedEvent")[0]){
                  $(".selectedEvent").removeClass('selectedEvent');
                  $(this).children().addClass('selectedEvent');
                  $(this).addClass('selectedEvent');
                  $(".hasRowSpan").removeClass('hasRowSpan');
                  $(this).children().addClass('hasRowSpan');
            } else {
                  $(this).children().addClass('selectedEvent');
                  $(this).addClass('selectedEvent');
                  $(this).children().addClass('hasRowSpan');
            }
      });
}

function getAttendanceData(eventID){
      $.ajax({
            url: 'script/returnAttendance.php',
            type: 'POST',
            async: false,
            data: ({eventID: eventID}),
            success: function(data, textStatus, xhr){
				  console.log(data);
                  displayEventHeader(data);
                  displayAttendance(data);
            },
            error: function(xhr, textStatus, errorThrown){
                  alert(textStatus);
            } 
      });
}

function selectEvent(){
      $('#eventTable').fadeOut("slow");
      var eventID = $("tr.selectedEvent").attr("id");
      getAttendanceData(eventID);
      $('#eventModal').modal('toggle');
      $('#eventTable').fadeIn("slow");
}

function displayEventHeader(xmlInfo){
	
      var eventName = xmlInfo.getElementsByTagName("event_name")[0].textContent;
      var eventDate = xmlInfo.getElementsByTagName("event_date")[0].textContent;
      var eventID = xmlInfo.getElementsByTagName("event_id")[0].textContent;

      console.log(eventName + " " + eventDate + " " + eventID);

      header = $(".eventHeader");
      heading = eventName + " " + eventDate;
      $(header).attr("id", eventID);

      $(header).html(heading);
}

function displayAttendance(xmlInfo){
      var users = xmlInfo.getElementsByTagName("user");
      table = $("#eventTable");
      tableContent = "";

      for (var i=0;i<users.length; i++){
            firstName = users[i].getElementsByTagName("first_name")[0].textContent;
            lastName = users[i].getElementsByTagName("last_name")[0].textContent;
            year = users[i].getElementsByTagName("year")[0].textContent;
            email = users[i].getElementsByTagName("email")[0].textContent;
            dorm = users[i].getElementsByTagName("dorm")[0].textContent;

            tableContent += "<tr><td>" + i + "</td><td>" + lastName + "</td><td>" + firstName + "</td><td>" + year + "</td><td>" + email + "</td><td>" + dorm + "</td></tr>";
      }
      $(table).html(tableContent);
}

function setLogout(){
      $.ajax({
            url: 'script/getUser.php',
            type: 'GET',
            async: false,
            success: function(data, textStatus, xhr){
                  var logout = "Log out - " + data;
                  $("#logoutButton").html(logout);
            },
            error: function(xhr, textStatus, errorThrown){
                  alert(textStatus);
            } 
      });
}

function logout(){
      $.ajax({
            url: 'script/logoutUser.php',
            type: 'GET',
            success: function(data, textStatus, xhr){
                  if (data == "destroyed"){
                        window.location.replace("http://nuaaiv.com/aaivAdmin/attendance.php");
                  }
            }
      });
}

function autoloadEvent(){
      $.ajax({
            url: 'script/getLatestEvent.php',
            type: 'GET',
            success: function(data, textStatus, xhr){
                  getAttendanceData(data);
            },
            error: function(xhr, textStatus, errorThrown){
                  alert(textStatus);
            },
            async: false
      });
}

function refreshAttendance(){
      $("#eventTable").fadeOut("fast");

      var sortOption = $(".glyphicon", "#sortDropdownDiv").parent().attr("id");
      var siftOption = $(".glyphicon", "#siftDropdownDiv").parent().attr("id");
      var eventID = $("h4").attr("id");
      
      $.ajax({
            url: 'script/returnSortedAttendance.php',
            type: 'POST',
            data: ({eventID: eventID,
                    sortOption: sortOption,
                    siftOption: siftOption}),
            success: function(data, textStatus, xhr){
                  console.log(data);
                  displayAttendance(data);
                  $("#eventTable").fadeIn("slow");
            },
            error: function(xhr, textStatus, errorThrown){
                  alert(textStatus + " " + errorThrown);
            },
            async: false
      });
}

function createEvent(){
      var eventName = $("#inputEventName").val();
      var eventDate = $("#datePicker").val();

      $.ajax({
            url: 'script/createEvent.php',
            type: 'POST',
            data: ({eventName: eventName,
                    eventDate: eventDate}),
            success: function(data, textStatus, xhr){
                  $("#inputEventName").val("");
                  $("#datePicker").val("");
                  displayEventCreationSuccess(data);
                  displayEventDelete();
<<<<<<< HEAD
                  displayEventEdit();
=======
>>>>>>> a93351d8a1dfce359288d972ec6b378b8f6df965
            },
            error: function(xhr, textStatus, errorThrown){
                  alert(textStatus + " " + errorThrown);
            },
            async: false
      });
}

function displayEventCreationSuccess(eventID){
      alert = $("#eventInsertSuccess");

      $(alert).html("You have successfully created a new event with the id: <strong>" + eventID + '</strong>!<a id="createClose" class="close" href="#">&times;</a>');
      $(alert).addClass("in");
      
      $("#createClose").click(function(event){
            $("#eventInsertSuccess").removeClass("in");
      });
}

function displayEventDeletionSuccess(eventID){
      alert = $("#eventDeleteSuccess");

      $(alert).html("You have successfully deleted the event with id: <strong>" + eventID + '</strong>! <a id="deleteClose" class="close" href="#">&times;</a>');
      $(alert).addClass("in");

      $("#deleteClose").click(function(event){
            $("#eventDeleteSuccess").removeClass("in");
      });
}

function displayEventEditSuccess(eventID, eventName, eventDate){
      alert = $("#eventEditSuccess");

      $(alert).html("You have successfully edited the event <strong>'" + eventName + " " + eventDate + "'</strong> with id: <strong>" + eventID + "</strong>!<a id='editClose' class='close' href='#'>&times;</a>");
      $(alert).addClass("in");

      $("#editClose").click(function(event){
            $("#eventEditSuccess").removeClass("in");
      });
}

function deleteSelectedEvent(){
      var eventID = $("tr.selectedEvent", "#tabs-pane3").attr("id");

      $.ajax({
            url: 'script/deleteEvent.php',
            type: 'POST',
            data: ({eventID: eventID}),
            success: function(data, textStatus, errorThrown){
                  if(data == "success"){
                        displayEventDeletionSuccess(eventID);
                  }
            },
            error: function(xhr, textStatus, errorThrown){
                  alert(textStatus + " " + errorThrown);
            },
            async: false
      });
      displayEventDelete();
      displayEventEdit();                  
      $("#eventDeleteModal").modal('hide');
}

function editSelectedEvent(){
      var eventID = $("tr.selectedEvent", "#tabs-pane2").attr("id");
      var newEventName = $("#editEventName").val();
      var newEventDate = $("#editDatePicker").val();
      $.ajax({
            url: 'script/editEvent.php',
            type: 'POST',
            data: ({eventID: eventID,
                    newEventName: newEventName,
                    newEventDate: newEventDate}),
            success: function(data, textStatus, errorThrown){
                  if(data == "success"){
                        displayEventEditSuccess(eventID, newEventName, newEventDate);
                  }
            },
            error: function(xhr, textStatus, errorThrown){
                  alert(textStatus + " " + errorThrown);
            },
            async: false
      });
      displayEventEdit();
      displayEventDelete();
      $("#eventEditModal").modal('hide');
}

<<<<<<< HEAD
/*



*/
function paginationSearch(searchString, pageNumber, pageSize){
      $.ajax({
            url: 'script/paginationSearch.php',
            type: 'POST',
            data: ({searchTerm: searchString,
                    pageSize: pageSize,
                    requestedPageNumber: pageNumber}),
            success: function(data, textStatus, errorThrown){
                  $("#paginationUI").off("click");
                  displayUserSearchResults(data);
                  displayPaginationUI(data, pageNumber, pageSize, searchString);
            },
            error: function(xhr, textStatus, errorThrown){
                  alert(textStatus + " " + errorThrown);     
            }
      });
}

function displayUserSearchResults(data){
      var users = data.getElementsByTagName("user");
      var tableHTML;
      var current = 0;

      for(var i=0; i < users.length; i++){
            user_ID = users[i].getElementsByTagName("user_id")[0].textContent;
            firstName = users[i].getElementsByTagName("first_name")[0].textContent;
            lastName = users[i].getElementsByTagName("last_name")[0].textContent;
            year = users[i].getElementsByTagName("year")[0].textContent;
            email = users[i].getElementsByTagName("email")[0].textContent;
            dorm = users[i].getElementsByTagName("dorm")[0].textContent;

            tableHTML += '<tr id="' + user_ID + '"><td>' + lastName + '</td><td>' + firstName + '</td><td>' + year + '</td><td>' + email + '</td><td>' + dorm + '</td></tr>';
      }

      $("#searchUsersResult").html(tableHTML);
}

function displayPaginationUI(data, pageNumber, pageSize, searchString){
      currentPage = data.getElementsByTagName("currentPage")[0].textContent;
      totalPages = data.getElementsByTagName("totalPages")[0].textContent;
      pageSize = data.getElementsByTagName("page_size")[0].textContent;

      var outputHTML = "";

      if(totalPages <= 1){
            outputHTML += "";
      } else {
            outputHTML += "<ul class='pagination'>";
            if (currentPage == 1){
                  outputHTML += "<li class='disabled'><a href='#'>&laquo;</a></li>";
            } else {
                  outputHTML += "<li class='previousPage'><a href='#'>&laquo;</a></li>";
            }
            for (var i=1; i<=totalPages; i++){
                  if (i == currentPage){
                        outputHTML += "<li class='active'><a href='#'>" + i + "</a></li>";
                  } else {
                        outputHTML += "<li><a href='#'>" + i + "</a></li>";
                  }
            }
            if (currentPage == totalPages){
                  outputHTML += "<li class='disabled'><a href='#'>&raquo;</a></li>";
            } else {
                  outputHTML += "<li class='nextPage'><a href='#'>&raquo;</a></li>"
            }
            outputHTML += "</ul>";
      }
      var paginationDiv = $("#paginationUI");
      $(paginationDiv).html(outputHTML);
      addPaginationListeners(paginationDiv, pageNumber, pageSize, searchString);
}

function addPaginationListeners(paginationDiv, currentPage, pageSize, searchString){
      $(paginationDiv).on("click", "li", function(event){
            if($(this).hasClass('previousPage')){
                  paginationSearch(searchString, (currentPage-1), 10);
            } else if ($(this).hasClass('nextPage')){
                  paginationSearch(searchString, (currentPage+1), 10);
            } else if ($(this).hasClass('disabled') || $(this).hasClass('active')){

            } else {
                  var val = parseInt($(this).children().text());
                  paginationSearch(searchString, val, 10);
            }
      });
}


=======
function displayEventDeletionSuccess(eventID){
      alert = $("#eventDeleteSuccess");

      $(alert).html("You have successfully deleted the event with id: <strong>" + eventID + '</strong>! <a class="close" href="#">&times;</a>');
      $(alert).addClass("in");

      $(".close").click(function(event){
            $(alert).removeClass("in");
      });
}

function deleteSelectedEvent(){
      var eventID = $("tr.selectedEvent", "#tabs-pane3").attr("id");

      $.ajax({
            url: 'script/deleteEvent.php',
            type: 'POST',
            data: ({eventID: eventID}),
            success: function(data, textStatus, errorThrown){
                  if(data == "success"){
                        displayEventDeletionSuccess(eventID);
                  }
            },
            error: function(xhr, textStatus, errorThrown){
                  alert(textStatus + " " + errorThrown);
            },
            async: false
      });
      displayEventDelete();
      $("#eventDeleteModal").modal('hide');
}

>>>>>>> a93351d8a1dfce359288d972ec6b378b8f6df965
