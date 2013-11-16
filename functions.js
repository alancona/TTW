function checkNewContributorForm () {
	var error = false;
	if ($.trim($("#first-name").val()).length == 0) {
		$("#first-err").html("First name cannot be blank.");
		error = true;
	} else {
		$("#first-err").empty();
	}
	if ($.trim($("#last-name").val()).length == 0) {
		$("#last-err").html("Last name cannot be blank.");
		error = true;
	} else {
		$("#last-err").empty();
	}
	/*
	var emailRegex = /\A[\w+\-.]+@[a-z\d\-.]+\.[a-z]+\z/i;
	if (!emailRegex.test($.trim($("#password").val()))) {
		$("#email-err").html("Not a valid email address.");
		error = true;
	} else {
		$("#email-err").empty();
	}
	*/
	if ($("#password").val().length < 5) {
		$("#password-err").html("Password must be at least 5 characters long.");
		error = true;
	} else {
		$("#password-err").empty();
	}
	if ($("#password-confirm").val() != $("#password").val()) {
		$("#password-confirm-err").html("Passwords must match.");
		error = true;
	} else {
		$("#password-confirm-err").empty();
	}
	if (error) {
		return false;
	}
}