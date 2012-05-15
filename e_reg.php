<?php
if (isset($_POST['submitted'])) {
	$errors = array();
	require_once ('e_msql_connect.php');

	if (eregi('^[[:alnum:]\.\'\-]{4,30}$', stripslashes(trim($_POST['username']))) ) {
		$user = mysql_real_escape_string($_POST['username']);
		$query = "SELECT username FROM employees WHERE username = '$user'";
		$result = @mysql_query($query);
		$num = @mysql_num_rows($result);
		if ($num> 0) {
			$errors[] = '<font color="red">The username you have chosen has already been taken, please try again.</font>';
		} else {
			$username = mysql_real_escape_string($_POST['username']);
		}
	} else {
		$errors[] = '<font color="red">Please provide a valid username between 4 and 30 characters.</font>';
	}

	if (!empty($_POST['password1'])) {
		if ($_POST['password1'] != $_POST['password2']) {
			$errors[] = '<font color="red">The 2 passwords you have entered do not match.</font>';
		} else {
			$password = $_POST['password1'];
		}
	} else {
		$errors[] = '<font color="red">Please provide a password.</font>';
	}

	if (!empty($_POST['fname'])){
	
		$fname = $_POST['fname'];
	}else {
		$errors[] = '<font color="red">Please provide a first name.</font>';
	}

	if (!empty($_POST['lname'])){
	
		$lname = $_POST['lname'];
	}else {
		$errors[] = '<font color="red">Please provide a last name.</font>';
	}

	if (!empty($_POST['position'])){
	
		$position = $_POST['position'];
	}else {
		$errors[] = '<font color="red">Please provide a position.</font>';
	}



	if (empty($errors)) {
		$query = "INSERT INTO employees (username,fname,lname,position,password) VALUES ('$username','$fname','$lname','$position','$password')";
		$result = @mysql_query($query);
		if (mysql_affected_rows() == 1) {
						// Show thank you message
			echo '<h3>Thank You!</h3>
			You have been registered.';
		} else {
			echo '<font color="red">You could not be registered, please contact us about the problem and we will fix it as soon as we can.</font>';
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

<h3>Register</h3>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
	<p><input type="text" name="username" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" size="30" maxlength="30" /> <small>Username</small></p>
	<p><input type="text" name="fname" size="30" maxlength="30" /> <small>First Name</small></p>
	<p><input type="text" name="lname" size="30" maxlength="30" /> <small>Last Name</small></p>
	<p><input type="text" name="position" size="30" maxlength="30" /> <small>Position</small></p>
	<p><input type="password" name="password1" size="30" maxlength="40" /> <small>Password</small></p>
	<p><input type="password" name="password2" size="30" maxlength="40" /> <small>Confirm Password</small></p>
	<p><input type="submit" name="submit" value="Register" /></p>
	<input type="hidden" name="submitted" value="TRUE" />
</form>
