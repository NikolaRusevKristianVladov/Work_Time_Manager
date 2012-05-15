<?php
ob_start();
$host="localhost"; // Host name
$username=""; // Mysql username
$password=""; // Mysql password
$db_name="project"; // Database name
$tbl_name="employees"; // Table name

// Connect to server and select databse.
mysql_connect("localhost", "root", "123")or die("cannot connect");
mysql_select_db("project")or die("cannot select DB");

// Define $myusername and $mypassword
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
// Register $myusername, $mypassword and redirect to file "login_success.php"
	session_register("myusername");
	session_register("mypassword");
	header("location:login_success.php");
}
else {
	echo "Wrong Username or Password";
}

ob_end_flush();
?>
