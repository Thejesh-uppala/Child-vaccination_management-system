<?php

$con=mysql_connect("localhost","root","") or die('Could not connect: ' . mysql_error());
 
mysql_select_db('e_vaccination');

$query="CREATE TABLE child(c_name VARCHAR(15) NOT NULL,
							c_gender VARCHAR(8),
							c_city VARCHAR(30),
							c_birth DATE,
							c_age INT(3),
							c_weight INT(5),
							c_height INT(5),
							c_vaccine VARCHAR(100),
							p_username VARCHAR(15),
							FOREIGN KEY(p_username) REFERENCES parent(p_username))";
							
$result=mysql_query($query,$con);

if(! $result)
{
	die('Could not insert Records: ' . mysql_error());
}
echo "<h2>Create Table  Successfully ...</h2><br>";

?>