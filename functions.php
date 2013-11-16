<?php
function printPermissions() {
	if (!isset($connection)) {
		include "dbconnection.php";
	}
	$stmt = $connection->prepare('SELECT Name, ID FROM Permissions');
	$stmt->execute();
	$stmt->bind_result($name, $id);

	$first = true;
	$radioSet = isset($_POST["permission"]);
	echo "\t<label for='permission'>Permissions<span class='required'>*</span></label><br />";
	while ($stmt->fetch()) {
		echo "\r\n\t<input type='radio' name='permission' value='{$id}'";
		if(!$radioSet && $first || $_POST["permission"] == $name) {
			echo "checked";
		}
		echo "/> " . ucwords($name) . "<br />";
		$first = false; 
	}
	echo "<br />\r\n";
	$stmt->close();
}
function processNewContributor() {
	if (!isset($_POST['first'])) {
		return;
	}
	$first_name = trim($_POST["first"]);
	$last_name = trim($_POST["last"]);
	$email = trim($_POST["email"]);
	$password = $_POST["password"];
	$password_confirm = $_POST["password-confirm"];

	if (!isset($connection)) {
		include "dbconnection.php";
	} 

	$errors = array();
	if (strlen($first_name) == 0) {
		$errors[] = "First name cannot be blank.";
	}
	if (strlen($last_name) == 0) {
		$errors[] = "Last name cannot be blank.";
	}
	if (!preg_match("/\A[\w+\-.]+@[a-z\d\-.]+\.[a-z]+\z/i", $email)) {
		$errors[] = "Not a valid email address.";
	} else {
		$stmt = $connection->prepare('SELECT Email FROM Contributors');
		$stmt->execute();
		$stmt->bind_result($existing_email);
		while ($stmt->fetch()) {
			if ($email == $existing_email) {
				$errors[] = "Email address already exists in database.";
				break;
			}
		}
		$stmt->close();
	}
	if (strlen($password) < 5) {
		$errors[] = "Password must be at least 5 characters long.";
	}
	if ($password !== $password_confirm) {
		$errors[] = "Passwords must match.";
	}
	if (count($errors) == 0) {
		$stmt = $connection->prepare('INSERT INTO Contributors (FirstName, LastName, Email, Password_Digest, Permission) VALUES
	(?, ?, ?, ?, ?)');
		$stmt->bind_param('ssssd', $first_name, $last_name, $email, $password, $_POST['permission']);
		$stmt->execute();
		$stmt->close();
		echo "<h3 style='color:green'>{$first_name} {$last_name} added to Contributors.</h3>\r\n";
	} else {
		echo "<h3 class='error'>The following errors occured:</h3>\r\n";
		echo "<ul>\r\n";
		foreach ($errors as $error) {
			echo "\t<li class='error'>{$error}</li>\r\n";
		}
		echo "</ul>\r\n";
	}
}
?>