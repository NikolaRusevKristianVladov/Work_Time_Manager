<?php
	require_once('e_msql_connect.php');

	$result = mysql_query("SELECT * FROM workcards");

	echo "<table border='1'>
	<tr>
	<th>ID</th>
	<th>Start date</th>
	<th>End date</th>
	<th>Assigment</th>
	<th>Description</th>
	</tr>";

	while($row = mysql_fetch_array($result))
	{
 		 echo "<tr>";
 		 echo "<td>" . $row['id'] . "</td>";
 		 echo "<td>" . $row['starta'] . "</td>";
		 echo "<td>" . $row['stopa'] . "</td>";
		 echo "<td>" . $row['assigment'] . "</td>";
		 echo "<td>" . $row['describea'] . "</td>";
  		echo "</tr>";
 	 }
	echo "</table>";

?> 
