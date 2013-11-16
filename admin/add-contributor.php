<?php include "../header.php"; ?>
<?php processNewContributor(); ?>
<form method="POST" id="submit-form" onsubmit="return checkNewContributorForm();">
<?php printPermissions(); 
$labels = array("First Name", "Last Name", "Email", "Password", "Confirm Password");
$fields = array("first", "last", "email", "password", "password-confirm");
$types = array("text","text","text","password","password");
$persists = array(TRUE, TRUE, TRUE, FALSE, FALSE);
for ($i = 0; $i < count($fields); $i++): 
	$field = $fields[$i]; ?>
	<label for="<?php echo $field;?>"><?php echo $labels[$i];?><span class="required">*</span></label><br />
	<input type="<?php echo $types[$i];?>" name="<?php echo $field;?>" id="<?php echo $field;?>" value="<?php if($persists[$i])echo $_POST[$field]; ?>" />
	<span class="error" id="<?php echo $field;?>-err"></span>
	<br /><br />
<?php endfor; ?>
	<input type="submit" name="submit" value="Submit" />
</form>
<?php include "../footer.php"; ?>