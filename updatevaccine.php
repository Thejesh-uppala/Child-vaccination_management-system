<?php 
	
	include 'database_connection.php';
	
	$c_name = $_REQUEST['c_name'];
	$vaccine_n = $_REQUEST['vaccine_n'];

	$query = "UPDATE vaccine_dates SET status='true' WHERE c_name='$c_name' AND name='$vaccine_n'";
	$result = mysqli_query($con,$query);
	if(!$result)
	{
		die(mysqli_error());
	}
	echo "<script>alert('Allocate Child Vaccine..!!');window.location='allocate_vaccine.php'</script>"
?>