<?php

$con=mysql_connect("localhost","root","") or die('Could not connect: ' . mysql_error());
 
mysql_select_db('e_vaccination');

$query="CREATE TABLE vaccine(name VARCHAR(50) NOT NULL,
							timing VARCHAR(20) NOT NULL)";
							
$result=mysql_query($query,$con);

if(! $result)
{
	die('Could not insert Records: ' . mysql_error());
}
echo "<h2>Create Table  Successfully ...</h2><br>";

?>