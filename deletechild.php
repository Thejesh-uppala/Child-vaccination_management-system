<?php

	include 'database_connection.php';

	$name = $_REQUEST['c_name'];
	$query = "DELETE FROM child where c_name='$name'";
	$query1 = "DELETE FROM vaccine_dates where c_name='$name'";

	$result=mysqli_query($con,$query);
	$result1=mysqli_query($con,$query1);
	if(!$result && !$result1)
	{
		die(mysqli_error());
	}
	echo "<script>alert('Record deleted..!!');window.location='viewchild.php'</script>";
?>