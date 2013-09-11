function submitLogin() {
	username = $('input[id=inputUser]').val();
	password = $('input[id=inputPassword]').val();

	var validState = validateForm(username, password);

	if (validState == 0){
		login(username, password);
	}
}

function isBlank(str) {
    return (!str || /^\s*$/.test(str));
}

function validateForm(username, password){
	var output = 0;
	if (isBlank(username)){
		output += 1;
		$("#usernameFG").addClass("has-error");
	}

	if (isBlank(password)){
		output += 1;
		$("#passwordFG").addClass("has-error");
	}

	return output;
}

function login(username, password){
	$.ajax({
		url: 'script/loginUser.php',
		type: 'POST',
		data: ({userName: username,
				password: password}),
		success: function(data, textStatus, xhr){
			if (data == "success"){
				window.location.replace("http://nuaaiv.com/aaivAdmin");
			}
		},
		error: function(xhr, textStatus, errorThrown){
			alert(textStatus);
		}
	});
}
