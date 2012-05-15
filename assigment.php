
<?php
if (isset($_POST['submitted'])) {
	$errors = array();
	require_once ('e_msql_connect.php');


	if (!empty($_POST['starta'])){
		$starta = $_POST['starta'];
	}else {
		$errors[] = '<font color="red">Please provide a start of assigment.</font>';
	}

	if (!empty($_POST['stopa'])){
	
		$stopa = $_POST['stopa'];
	}else {
		$errors[] = '<font color="red">Please provide an end of assigment.</font>';
	}


	if (!empty($_POST['assigment'])){
	
		$assigment = $_POST['assigment'];
	}else {
		$errors[] = '<font color="red">Please provide a name for assigment.</font>';
	}


	if (!empty($_POST['describe'])){
	
		$describe = $_POST['describe'];
	}else {
		$errors[] = '<font color="red">Please provide a description.</font>';
	}


	if (empty($errors)) {
		$query ="INSERT INTO assig (starta,stopa,assigment,describea) VALUES ('$starta','$stopa','$assigment','$describe')";
		$result = @mysql_query($query);
		if (mysql_affected_rows() == 1) {
						// Show thank you message
			echo 'Your assigment has been added.';
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

<h3>Add assigment</h3>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
	<p><input type="text" name="starta" size="30" maxlength="30" /> <small>Start of assigment</small></p>
	<p><input type="text" name="stopa" size="30" maxlength="30" /> <small>End of assigment</small></p>
	<p><input type="text" name="assigment" size="30" maxlength="30" /> <small>Name of assigment</small></p>
	<p><input type="text" name="describe" size="30" maxlength="30" /> <small>Short description</small></p>

	<p><input type="submit" name="submit" value="Update" /></p>
	<input type="hidden" name="submitted" value="TRUE" />
</form>
