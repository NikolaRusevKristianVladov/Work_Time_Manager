<?php
if (isset($_POST['submitted'])) {
	$errors = array();
	require_once ('e_msql_connect.php');


	if (!empty($_POST['manager'])){
	
		$manager = $_POST['manager'];
	}else {
		$errors[] = '<font color="red">Please provide a manager.</font>';
	}

	if (!empty($_POST['hs'])){
	
		$hs = $_POST['hs'];
	}else {
		$errors[] = '<font color="red">Please provide hours spent.</font>';
	}


	if (!empty($_POST['stat'])){
	
		$stat = $_POST['stat'];
	}else {
		$errors[] = '<font color="red">Please provide status.</font>';
	}

	if (!empty($_POST['assigment'])){
	
	$assigment = $_POST['assigment'];
	}else {
		$errors[] = '<font color="red">Please provide assigment.</font>';
	}


	if (empty($errors)) {
		$query ="INSERT INTO workcards (manager,hs,status,assigment) VALUES ('$manager','$hs','$stat','$assigment')";
		$result = @mysql_query($query);
		if (mysql_affected_rows() == 1) {
						// Show thank you message
			echo 'Your workcard has been added.';
		} else {
			echo '<font color="red">There was error while adding your assigment.</font>';
		}

	} else {
		echo '<h3>Error!</h3>
		The following error(s) occured:<br />';
		foreach ($errors as $msg) {
			echo " - <font color=\"red\">$msg</font><br />\n";
		}
	}
}
?>

<h3>Add workcard</h3>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
	<p><input type="text" name="manager" size="30" maxlength="30" /> <small>Manager </small></p>
	<p><input type="text" name="hs" size="30" maxlength="30" /> <small>Hours Spent</small></p>
	<p><input type="text" name="stat" size="30" maxlength="30" /> <small>Status </small></p>
	<p><input type="text" name="assigment" size="30" maxlength="30" /> <small>Assigment  </small></p>

	<p><input type="submit" name="submit" value="Update" /></p>
	<input type="hidden" name="submitted" value="TRUE" />
</form>
