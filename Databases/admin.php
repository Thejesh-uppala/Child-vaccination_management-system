<?php

$con=mysqli_connect("localhost","root","") or die('Could not connect: ' . mysqli_error());
 
mysqli_select_db('e_vaccination');

$query="CREATE TABLE admin(username VARCHAR(15) NOT NULL,
							lastname VARCHAR(15),
							gender VARCHAR(8) NOT NULL,
							city VARCHAR(30),
							birth DATE,
							type VARCHAR(10),
							email VARCHAR(30),
							pass VARCHAR(25))";
							
$result=mysqli_query($query,$con);

if(! $result)
{
	die('Could not insert Records: ' . mysqli_error());
}
echo "<h2>Create Table  Successfully ...</h2><br>";

?>