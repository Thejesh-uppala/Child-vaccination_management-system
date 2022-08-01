<!DOCTYPE html>
<html>
<head>
	<title>Edit Child Details</title>
</head>
<style>
	body{
		background-repeat:no-repeat;
		background: url('childback.jpg');
	}
	div{
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
	    margin: 42px 50px 50px 50px;
	    padding: 25px;
	    background: url('main1.svg');
	    font-family:Century Gothic;	
		border: black;
		box-shadow: black;
	}
	select{
		width: 200px; 
		height: 30px;
	}
	input[type='submit']{
		width:130px;
		height:35px;
		border-radius:50px 50px 50px 50px;
	}
</style>

<body>
<form method="POST" class="container" action="<?php $_SERVER['PHP_SELF'] ?>">

<div>
<a href="viewparentchild.php"><img src="arrowback.svg" width="30" height="30"></a>
<center><h1>Update Child Details</h1></center>

<?php
	include 'database_connection.php';

	$c_name = $_REQUEST['c_name'];
	$query = "SELECT * FROM child where c_name='$c_name'";

	$result = mysqli_query($con,$query);

	while ($row = mysqli_fetch_array($result)) 
	{
		
?>
<label><b>Child Full Name</b></label></br>
<input type="text" name="cname" class="text" placeholder="Enter First Name" size="70" value="<?php echo $row['c_name']; ?>"  disabled/></br></br>

<label><b>Child Gender</b></label></br>
<input type="radio" name="cgender" value="Male"  <?php echo $row['c_gender'] == "Male" ? 'checked': '' ?>/>Male
<input type="radio" name="cgender" value="Female" <?php echo $row['c_gender'] == "Female" ? 'checked': '' ?>/>Female

</br></br>
<label><b>Address</b><span class="error"></span></label></br>
<input type="text" name="ccity" placeholder="Your Address" size="62" required />

</br></br>
<label ><b>Child Birth Date </b></label></br>
	<input type="date" name="cbirth" value="<?php echo $row['c_birth']; ?>" />
</br></br>

<label><b>Child Age </b></label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
<label><b>Child Weight </b></label>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
<label><b>Child Height </b></label><br>

<input type="number" name="cage" class="text" placeholder="Age" value="<?php echo $row['c_age']; ?>" />
<input type="number" name="cweight" class="text" placeholder="Weight" value="<?php echo $row['c_weight']; ?>" />
<input type="number" name="cheight" class="text" placeholder ="Height" value="<?php echo $row['c_height']; ?>" />

</br></br>

<center><input type="submit" name="editchild" value="Edit Child Details"/></center>

</div>

</body>
</html>

<?php
	}
	if(isset($_POST['editchild']))
	{
		$gen = $_POST['cgender'];
		$city = $_POST['ccity'];
		$birth = $_POST['cbirth'];
		$age = $_POST['cage'];
		$weight = $_POST['cweight'];
		$height = $_POST['cheight'];

		$query="UPDATE child SET c_gender='$gen', c_city='$city', c_birth='$birth', c_age=$age, c_weight=$weight, c_height=$height WHERE c_name='$c_name'";

		$result=mysqli_query($con,$query);

		if(!$result)
		{
			die("<br>Can't Insert Data : " .mysqli_error());
		}

		echo "<script>alert('Edit Child Details..!!');window.location='viewparentchild.php'</script>";	
	}
	

?>
