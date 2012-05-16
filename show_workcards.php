<h3>Select user</h3>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
	<p><small>Show workcards for user: </small><input type="text" name="user" size="30" maxlength="30" /></p>
	<p><input type="submit" name="submit" value="Show" /></p>
	<input type="hidden" name="submitted" value="TRUE" />
</form>

<?php
if (isset($_POST['submitted'])) {
	$errors = array();
		require_once ('e_msql_connect.php');

if (!empty($_POST['user'])){
	
	$user = $_POST['user'];
	}else {
		$errors[] = '<font color="red">Please choose a user.</font>';
}

if (empty($errors)) {

	$result = mysql_query("SELECT * FROM assig");

	echo "<table border='1'>
	<tr>
	<th>ID</th>
        <th>Hous Spent </th>
        <th>Status</th>
        <th>Assigment</th>
	</tr>";

	while($row = mysql_fetch_array($result))
	{
		if($row['manager']==$user){
 		 	echo "<tr>";
			echo "<td>" . $row['id'] . "</td>";
		 	echo "<td>" . $row['hs'] . "</td>";
		 	echo "<td>" . $row['status'] . "</td>";
		 	echo "<td>" . $row['assigment'] . "</td>";
  			echo "</tr>";
		}
 	 }
	echo "</table>";

} else {
		echo '<h3>Error!</h3>
		The following error(s) occured:<br />';
		foreach ($errors as $msg) {
			echo " - <font color=\"red\">$msg</font><br />\n";
		}
	}





}
