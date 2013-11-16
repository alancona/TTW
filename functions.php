<?php
function printPermissions() {
	if (!isset($connection)) {
		include "dbconnection.php";
	}
	$stmt = $connection->prepare('SELECT Name FROM Permissions');
	$stmt->execute();
	$stmt->bind_result($name);
	$first = true;
	$radioSet = isset($_POST["permission"]);
	while ($stmt->fetch()) {
		echo "<input type='radio' name='permission' value='{$name}'";
		if(!$radioSet && $first || $_POST["permission"] == $name) {
			echo "checked";
		}
		echo "/> " . ucwords($name) . "<br />";
		$first = false; 
	}
	$stmt->close();
}
function processNewContributor() {
	/*
	$first_name = isset($_POST["first-name"]) ? trim($_POST["first-name"]) : "";
	$last_name = isset($_POST["last-name"]) ? trim($_POST["last-name"]) : "";
	$email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
	$password = isset($_POST["password"]) ? $_POST["password"] : "";
	$password_confirm = isset($_POST["password-confirm"]) ? $_POST["password-confirm"] : "";
	$error = false;
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
	$emailRegex = /\A[\w+\-.]+@[a-z\d\-.]+\.[a-z]+\z/i;
	if (!emailRegex.test($("#password").val())) {
		$("#email-err").html("Not a valid email address.");
		error = true;
	} else {
		$("#email-err").empty();
	}
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
	if (!error) {
		$("#submit-form").submit();
	}*/
}
?>