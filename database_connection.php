<?php
	$con=mysqli_connect("localhost","root","","e_vaccination");

	if(!$con){
		die('Mysql Connection Error'. mysqli_connect_error());
	}
?>