function displayModalEvents(){
      $.ajax({
            url: 'eventListModal.php',
            type: 'GET',
            success: function(data, textStatus, xhr){
                  var events = data.getElementsByTagName("event");
                  var modalHTML = '<table class ="table table-hover"> <thead> <tr> <th>#</th><th>Event</th><th>Date</th></tr></thead><tbody id="selectEvent">';
                  var current = 0;

                  for (var i=0;i<events.length; i++){
                        name = events[i].getElementsByTagName("event_name")[0].textContent;
                        date = events[i].getElementsByTagName("event_date")[0].textContent;
                        current = i+1;
                        modalHTML += '<tr><td>' + current + '</td><td>' + name + '</td><td>' + date + '</td></tr>';
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