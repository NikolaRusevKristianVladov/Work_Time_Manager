<?php
session_start();
if(!session_is_registered(myusername)){
header("location:main_login.php");
}
?>

<html>
<body>
<h3 align="center">Login successful</h3>
<br />
<h4>Please choose one of the following options:</h4>


<a href="assigment.php" >1.Add asigment</a><br />
<a href="assig.php">2.Add workcard</a><br />
<a href="show_users.php" >3.Show users</a><br />
<a href="show_workcards.php" >4.Show workcards</a><br />





</body>
</html>
