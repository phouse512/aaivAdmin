function test(hello){

	console.log(hello);
}

function buildPanel(streak_data, streak_group){
	var users = streak_data.getElementsByTagName("users");
	var tableHTML;
	var panelHTML;
	var current = 0;

	panelHTML = '<div class="panel panel-default"><div class="panel-heading">';
	panelHTML += 'Streak ' + streak_group + '</div><table class="table table-hover"><thead><'

	for(var i=0; i < users.length; i++){
	    user_ID = users[i].getElementsByTagName("user_id")[0].textContent;
	    firstName = users[i].getElementsByTagName("first_name")[0].textContent;
	    lastName = users[i].getElementsByTagName("last_name")[0].textContent;
	    year = users[i].getElementsByTagName("year")[0].textContent;
	    email = users[i].getElementsByTagName("email")[0].textContent;
	    dorm = users[i].getElementsByTagName("dorm")[0].textContent;

	    tableHTML += '<tr id="' + user_ID + '"><td>' + lastName + '</td><td>' + firstName + '</td><td>' + year + '</td><td>' + email + '</td><td>' + dorm + '</td></tr>';
	}


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
}

function circlePopups(){
	var circleClass = "#circle";
	for(var i=1; i<=8; i++){
		tempCircleClass = circleClass + i.toString();
		$(tempCircleClass).tooltip({'placement' : 'top'});
	}
}

function circleListeners() {
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