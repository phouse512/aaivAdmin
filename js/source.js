function displayModalEvents(){
      $.ajax({
            url: 'script/eventListModal.php',
            type: 'GET',
            success: function(data, textStatus, xhr){
                  var events = data.getElementsByTagName("event");
                  var modalHTML = '<table class ="table table-hover"> <thead> <tr> <th>#</th><th>Event</th><th>Date</th></tr></thead><tbody id="selectEvent">';
                  var current = 0;

                  for (var i=0;i<events.length; i++){
                        event_ID = events[i].getElementsByTagName("event_id")[0].textContent;
                        name = events[i].getElementsByTagName("event_name")[0].textContent;
                        date = events[i].getElementsByTagName("event_date")[0].textContent;
                        current = i+1;
                        modalHTML += '<tr id="' + event_ID + '"><td>' + current + '</td><td>' + name + '</td><td>' + date + '</td></tr>';
                  }

                  modalHTML += '</tbody></table>';

                  $('#eventModalBody').html(modalHTML);

                  $("#selectEvent").delegate("tr", "click", function(){
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
            },
            error: function(xhr, textStatus, errorThrown){
                  alert(textStatus);
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
                  displayAttendance(data);
            },
            error: function(xhr, textStatus, errorThrown){
                  alert(textStatus);
            } 
      });
}

function selectEvent(){
      var eventID = $("tr.selectedEvent").attr("id");
      getAttendanceData(eventID);
}

function displayAttendance(xmlInfo){
      var users = xmlInfo.getElementsByTagName("user");
      var eventName = xmlInfo.getElementsByTagName("event_name")[0].textContent;
      var eventDate = xmlInfo.getElementsByTagName("event_date")[0].textContent;
      console.log(eventName);
      console.log(users);

      table = $("#eventTable");
      header = $("#eventHeader");

      heading = eventName + " " + eventDate;
      tableContent = "";

      for (var i=0;i<users.length; i++){
            firstName = users[i].getElementsByTagName("first_name")[0].textContent;
            lastName = users[i].getElementsByTagName("last_name")[0].textContent;
            year = users[i].getElementsByTagName("year")[0].textContent;
            email = users[i].getElementsByTagName("email")[0].textContent;
            dorm = users[i].getElementsByTagName("dorm")[0].textContent;

            tableContent += "<tr><td>" + i + "</td><td>" + lastName + "</td><td>" + firstName + "</td><td>" + year + "</td><td>" + email + "</td><td>" + dorm + "</td></tr>";
      }
      $(header).html(heading);
      $(table).html(tableContent);

      $('#eventModal').modal('toggle');
}

function setLogout(){
      $.ajax({
            url: 'script/getUser.php',
            type: 'GET',
            async: false,
            success: function(data, textStatus, xhr){
                  console.log(data);
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
      })
}