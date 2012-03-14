//Work Card

//First Work Card 


<html>
<body>

<form action="xml.php" method="post">

<h2 align="center">Work Card<h2>

<p align="center">

<table>
	<td> <th>START</th> </td>
	<tr> <th>Hour:</th> <th> <input type="text" name="name"/> </th> </tr>
	<tr> <th>Data:</th> <th> <input type="text" name="city"/> </th> </tr>
	<td> <th>END</th> </td>
	<tr> <th>Hour:</th> <th> <input type="text" name="lat"/> </th> </tr>
	<tr> <th>Data:</th> <th> <input type="text" name="lon"/> </th> </tr>
	<td> <th>Description of the work</th> </td>
	<tr> <th>Work name:</th> <th> <input type="text" name="lon"/> </th> </tr>
	<tr> <th>Short Description:</th> <th> <input type="text" name="lon"/> </th> </tr>
</table>
</p>
<h2 align="center">Befor press save u must know that u can't delete or change the information after u save it!</h2>
<p align="center">
<a> <input type= "submit" value="Save"/> </a>
	
</p>
</form>

<p align="center">	

<?php
	
$s_hour=$_POST["Hour"];
$s_data=$_POST["Data"];
$e_our=$_POST["Hour"];
$e_data=$_POST["Data"];
$work_name=$_POST["Work name"];
$small_description=$_POST["Small Description"];

if($s_hour!="" && $s_data!="" && $e_hour!="" && $e_data!="" && $work_name!="" && $small_description!=""){
	$xml = SimpleXML_Load_File("xml.xml");
	
	$sxe = new SimpleXMLElement($xml->asXML());
	$card = $sxe->addChild("card");
	
	$START = $card->addChild("start");
	$START->addChild("hour" , $s_hour);
	$START->addChild("data", $s_data);
	
	$END = $card->addChild("end");
	$END->addChild("hour" , $e_hour);
	$END->addChild("data" , $e_data);
	
	$dotw=$card->addChild("dotw");
	$dotw->addChild("Work_name", $work_name);
	$dotw->addChild("small_description", $small_description);
	
	$sxe->asXML(xml.xml);

}

?>

</p>


<p align="center">
<?php
$card= new SimpleXMLElement('xml.xml', null, true);

echo <<<EOF
<table border="1" cellpadding="3">
        <tr>
                <td align="center">proba</td>
                <td align="center">proba</td>
                <td align="center">proba</td>
                <td align="center">proba</td>
        </tr>

EOF;
foreach($work_c as $card) // loop through our books
{
        echo <<<EOF
        <tr>
                <td align="center">{$card->START->s_hour}</td>
                <td align="center">{$card->START->s_data}</td>
                <td align="center">{$card->END->e_hour}</td>
                <td align="center">{$card->END->e_data}</td>
		<td align="center">{$card->dotw->work_name}</td>
		<td align="center">{$card->dotw->small_description}</td>
                
        </tr>

EOF;
}
echo '</table>';


</body>
</html>