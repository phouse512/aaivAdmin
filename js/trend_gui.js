function test(hello){
	$.ajax({
	    url: 'script/streakAnalysis.php',
	    type: 'GET',
	    success: function(data, textStatus, xhr){
	    	console.log(data);
	    },
	    error: function(xhr, textStatus, errorThrown){
			alert(textStatus);
	    }
	});
}

function getStreakData(eventID){
	$.ajax({
	    url: 'script/getStreaks.php',
	    type: 'POST',
        data: ({eventID: eventID}),
	    success: function(data, textStatus, xhr){
	    	console.log(data);
	    	displayStreakData(data);
	    },
	    error: function(xhr, textStatus, errorThrown){
			alert(textStatus + " " + errorThrown);
	    },
	    async: false
	});
}

function displayStreakData(streakData){
	var streaks = streakData.getElementsByTagName("streak");
	var tableBodyHTML;
	var panelClass = ".panel";
	var tempPanelClass;

	for (var i=0; i<streaks.length; i++){
		updatePopupText((i+1), streaks[i].getElementsByTagName("user").length);
		tableBodyHTML = buildUserTable(streaks[i]);
		var tempPanelClass = panelClass + (i+1).toString();
		$(tempPanelClass).find("tbody").html(tableBodyHTML);
	}

	updatePopupText(9, streakData.getElementsByTagName("new_users")[0].getElementsByTagName("user").length);

	//implementation for 9th panel - new users
	var newUsers = streakData.getElementsByTagName("new_users");
	tableBodyHTML = buildUserTable(newUsers[0]);
	$(".panel-new").find("tbody").html(tableBodyHTML);

	updateHeading(streakData.getElementsByTagName("event_name")[0].textContent, streakData.getElementsByTagName("event_date")[0].textContent);
}

function buildUserTable(data){
	var users = data.getElementsByTagName("user");
	console.log(data);

	//fix offset columns!
	var tableBodyHTML = "";
	if(users.length > 0){
		for(var i=0; i < users.length; i++){
		    user_ID = users[i].getElementsByTagName("user_id")[0].textContent;
		    firstName = users[i].getElementsByTagName("first_name")[0].textContent;
		    lastName = users[i].getElementsByTagName("last_name")[0].textContent;
		    year = users[i].getElementsByTagName("year")[0].textContent;
		    email = users[i].getElementsByTagName("email")[0].textContent;
		    dorm = users[i].getElementsByTagName("dorm")[0].textContent;

		    tableBodyHTML += '<tr id="' + user_ID + '"><td>' + (i+1) + '</td><td>' + lastName + '</td><td>' + firstName + '</td><td>' + year + '</td><td>' + email + '</td><td>' + dorm + '</td></tr>';
		}
	}
	return tableBodyHTML;
}

function updatePopupText(iteration, userNumber){
	if (iteration == 9){
		circleClass = "#circle-new";
	} else {
		var circleClass = "#circle" + iteration.toString();
	}
	var outputString = userNumber.toString() + " Users";
	if(userNumber == 1){
		outputString = userNumber.toString() + " User";
	}
	$(circleClass).attr("data-original-title", outputString);
}

function updateHeading(eventName, eventDate){
	outputString = "Event: " + eventName + " " + eventDate;
	$(".trendsHeading").html(outputString);
}

function setPanelOffsets(){
	var circleClass = "#circle";
	var panelClass = ".panel";
	var tempClass = "";

	for(var i=1; i<= 4; i++){
		tempPanelClass = panelClass + i.toString();
		tempCircleClass = circleClass + i.toString();
		offset = $(tempCircleClass).offset();
		$(tempPanelClass).css('left', offset.left - 25);
	}

	for (var i=5; i<=8; i++){
		tempPanelClass = panelClass + i.toString();
		tempCircleClass = circleClass + i.toString();
		offset = $(tempCircleClass).offset();
		$(tempPanelClass).css('left', offset.left - 700);
	}

	newOffset = $("#circle-new").offset();
	$(".panel-new").css('left', newOffset.left - 277);
}

function circlePopups(){
	var circleClass = "#circle";
	for(var i=1; i<=8; i++){
		tempCircleClass = circleClass + i.toString();
		$(tempCircleClass).tooltip({'placement' : 'top'});
	}

	$("#circle-new").tooltip({'placement' : 'top' });
}

function clearSelectedPanels(){
	$(".panel-selected").addClass("panel-notselected");
	$(".panel-selected").removeClass("panel-selected");
}

function circleListeners() {
	$("#circle-new").on("click", function(){
		$(".panel-selected").addClass("panel-notselected");
		$(".panel-selected").removeClass("panel-selected");
		$(".panel-new").addClass("panel-selected");
		$(".panel-new").removeClass("panel-notselected");
		$(".clicked").removeClass("clicked");
		$(this).addClass("clicked");
	});
	$("#circle1").on("click", function() {
		$(".panel-selected").addClass("panel-notselected");
		$(".panel-selected").removeClass("panel-selected");
		$(".panel1").addClass("panel-selected");
		$(".panel1").removeClass("panel-notselected");
		$(".clicked").removeClass("clicked");
		$(this).addClass("clicked");
	});
	$("#circle2").on("click", function() {
		$(".panel-selected").addClass("panel-notselected");
		$(".panel-selected").removeClass("panel-selected");
		$(".panel2").addClass("panel-selected");
		$(".panel2").removeClass("panel-notselected");
		$(".clicked").removeClass("clicked");
		$(this).addClass("clicked");
	})
	$("#circle3").on("click", function() {
		$(".panel-selected").addClass("panel-notselected");
		$(".panel-selected").removeClass("panel-selected");
		$(".panel3").addClass("panel-selected");
		$(".panel3").removeClass("panel-notselected");
		$(".clicked").removeClass("clicked");
		$(this).addClass("clicked");
	})
	$("#circle4").on("click", function() {
		$(".panel-selected").addClass("panel-notselected");
		$(".panel-selected").removeClass("panel-selected");
		$(".panel4").addClass("panel-selected");
		$(".panel4").removeClass("panel-notselected");
		$(".clicked").removeClass("clicked");
		$(this).addClass("clicked");
	})
	$("#circle5").on("click", function() {
		$(".panel-selected").addClass("panel-notselected");
		$(".panel-selected").removeClass("panel-selected");
		$(".panel5").addClass("panel-selected");
		$(".panel5").removeClass("panel-notselected");
			$(".clicked").removeClass("clicked");
		$(this).addClass("clicked");
	})
	$("#circle6").on("click", function() {
		$(".panel-selected").addClass("panel-notselected");
		$(".panel-selected").removeClass("panel-selected");
		$(".panel6").addClass("panel-selected");
		$(".panel6").removeClass("panel-notselected");
		$(".clicked").removeClass("clicked");
		$(this).addClass("clicked");
	})
	$("#circle7").on("click", function() {
		$(".panel-selected").addClass("panel-notselected");
		$(".panel-selected").removeClass("panel-selected");
		$(".panel7").addClass("panel-selected");
		$(".panel7").removeClass("panel-notselected");
		$(".clicked").removeClass("clicked");
		$(this).addClass("clicked");
	})
	$("#circle8").on("click", function() {
		$(".panel-selected").addClass("panel-notselected");
		$(".panel-selected").removeClass("panel-selected");
		$(".panel8").addClass("panel-selected");
		$(".panel8").removeClass("panel-notselected");
		$(".clicked").removeClass("clicked");
		$(this).addClass("clicked");
	})
}