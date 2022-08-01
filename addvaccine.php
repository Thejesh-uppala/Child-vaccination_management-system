<!DOCTYPE html>
<html>
<head>
	<title>Add Vaccine</title>
</head>
<style>
	body {
	  font-family: "Lato", sans-serif;
	  background-size: cover;
	  position: fixed;
	  background: url('childback.jpg');
	}
	.div{
        padding:20;
        font-size:20;
    }
	.text{
		background-color:#c2d6d6;
		border:none;
		padding:9px 10px;
	}	
	.container {
	    position:absolute;
	    margin: 72px 50px 50px 600px;
	    padding: 90px;
	    background: url('main1.svg');
	    font-family:Century Gothic;	
	}
	input[type='submit']{
		width:100px;
		height:35px;
		border-radius:50px 50px 50px 50px;
	}
</style>

<body>
<form method="POST" class="container" action="<?php $_SERVER['PHP_SELF'] ?>">

<div class="div">
<a href="adminindex.php"><img src="arrowback.svg" width="30" height="30"></a>

<h1>Add Vaccine</h1>	

<label ><b>Vaccine Name</b></label></br>
<select name="vaccine" style="width: 200px; height: 30px">
	<option value="none" selected disabled hidden> Select an Vaccine</option>
	<option value="BCG">BCG</option>
	<option value="Hepatitis B Birth dose">Hepatitis B Birth dose</option>
	<option value="OPV Birth dose">OPV Birth dose </option>
	<option value="IPV (inactivated Polio Vaccine)">IPV (inactivated Polio Vaccine)</option>
	<option value="Pentavelant">Pentavelant</option>
	<option value="Rota Virus Vaccine">Rota Virus Vaccine</option>
	<option value="DPT 1st  booster">DPT 1st  booster</option>
	<option value="DPT2 2nd Booster">DPT 2nd Booster </option>
	<option value="Vitamin A">Vitamin A</option>
	<option value="other">Other</option>
</select> 

<br><br>

<center><input type="Submit" name="addvaccine" value="Add Vaccine"/></center>

</div>

<?php

	include 'database_connection.php';
	
	if(isset($_POST['addvaccine']))
	{
		$name = $_POST['vaccine'];

		$time = '$c_birth';

		if($name == 'BCG')
			$time = '+6 month';
		elseif ($name == 'Hepatitis B Birth dose') 
			$time = '+1 day';
		elseif ($name == 'OPV Birth dose')
			$time = '+10 day';
		elseif ($name == 'IPV (inactivated Polio Vaccine)')
			$time = '+3 month';
		elseif ($name == 'Pentavelant')
			$time = '+2 month';
		elseif ($name == 'Rota Virus Vaccine')
			$time = '+2 month';
		elseif ($name == 'DPT 1st  booster')
			$time = '+24 month';
		elseif ($name == 'DPT2 2nd Booster')
			$time = '+60 month';
		else
			$time = '+9 month';

		$query="INSERT INTO vaccine VALUES('$name','$time')";
		
		$result=mysqli_query($con,$query);

		if(!$result)
		{
			die("<br>Can't Insert Data : " .mysqli_error());
		}
		
		echo "<script>alert('Add Vaccine Details..!!');window.location='addvaccine.php'</script>";
	}
?>


</body>
</html>