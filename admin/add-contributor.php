<?php include "../header.php"; ?>
<?php processNewContributor(); ?>
<form method="POST" enctype="multipart/form-data" id="submit-form" onsubmit="return checkNewContributorForm();">
	<label for="first-name">First Name<span class="required">*</span></label><br />
	<input type="text" name="first-name" id="first-name" value="<?php echo $_POST['first-name']; ?>" />
	<span class="error" id="first-err"></span>
	<br /><br />
	<label for="last-name">Last Name<span class="required">*</span></label><br />
	<input type="text" name="last-name" id="last-name" value="<?php echo $_POST['last-name']; ?>" />
	<span class="error" id="last-err"></span>
	<br /><br />
	<label for="email">Email<span class="required">*</span></label><br />
	<input type="text" name="email" id="email" value="<?php echo $_POST['email']; ?>" />
	<span class="error" id="email-err"></span>
	<br /><br />
	<?php printPermissions(); ?>
	<br />
	<label for="password">Password<span class="required">*</span></label><br />
	<input type="password" name="password" id="password" value="" />
	<span class="error" id="password-err"></span>
	<br /><br />
	<label for="password-confirm">Confirm Password<span class="required">*</span></label><br />
	<input type="password" name="password-confirm" id="password-confirm" value="" />
	<span class="error" id="password-confirm-err"></span>
	<br /><br />
	<input type="submit" name="submit" value="Submit" />
</form>
<?php include "../footer.php"; ?>