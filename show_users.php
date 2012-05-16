<?php
	require_once('e_msql_connect.php');

	$result = mysql_query("SELECT * FROM employees");

	echo "<table border='1'>
	<tr>
	<th>ID</th>
	<th>Username</th>
	</tr>";

	while($row = mysql_fetch_array($result))
	{
 		 echo "<tr>";
 		 echo "<td>" . $row['id'] . "</td>";
 		 echo "<td>" . $row['username'] . "</td>";
  		echo "</tr>";
 	 }
	echo "</table>";

?> 
