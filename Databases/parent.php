<?php

$con=mysql_connect("localhost","root","") or die('Could not connect: ' . mysql_error());
 
mysql_select_db('e_vaccination');

$query="CREATE TABLE parent(p_username VARCHAR(15) NOT NULL,
							p_lastname VARCHAR(15),
							p_gender VARCHAR(8) NOT NULL,
							p_city VARCHAR(30),
							p_birth DATE,
							type VARCHAR(10),
							p_email VARCHAR(30),
							p_pass VARCHAR(25))";
							
$result=mysql_query($query,$con);

if(! $result)
{
	die('Could not insert Records: ' . mysql_error());
}
echo "<h2>Create Table  Successfully ...</h2><br>";

?>