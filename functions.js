function checkNewContributorForm () {
	var error = false;
	var notBlank = /\S/;
	if (notBlank.test($("#first").val())) {
		$("#first-err").empty();
	} else {
		$("#first-err").html("First name cannot be blank.");
		error = true;
	}
	if (notBlank.test($("#last").val())) {
		$("#last-err").empty();
	} else {
		$("#last-err").html("Last name cannot be blank.");
		error = true;
	}
	var isEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	if (isEmail.test($("#email").val())) {
		$("#email-err").empty();
	} else {
		$("#email-err").html("Not a valid email address.");
		error = true;
	}
	if ($("#password").val().length >= 5) {
		$("#password-err").empty();
	} else {
		$("#password-err").html("Password must be at least 5 characters long.");
		error = true;
	}
	if ($("#password-confirm").val() == $("#password").val()) {
		$("#password-confirm-err").empty();
	} else {
		$("#password-confirm-err").html("Passwords must match.");
		error = true;
	}
	return !error;
}