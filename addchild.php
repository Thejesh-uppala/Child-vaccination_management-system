<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Child</title>
</head>
<style>
	body{
		background-repeat:no-repeat;
		background: url('childback.jpg');
	}
	.text{
		background-color:#c2d6d6;
		border:none;
		padding:9px 10px;
	}	
	.container {
	    position:absolute;
	    margin: 22px 50px 50px 40px;
	    padding: 25px;
	    background: url('main1.svg');
	    font-family:Century Gothic;	
	}
	select{
		width: 200px; 
		height: 30px;
	}
	input[type='submit']{
		width:100px;
		height:35px;
		border-radius:50px 50px 50px 50px;
	}
</style>

<body>
<form method="POST" class="container" action="<?php $_SERVER['PHP_SELF'] ?>">

<div style="padding:20;font-size:20">

<a href="parentindex.php"><img src="arrowback.svg" width="30" height="30"></a>

<center><h1 >Add Child Details</h1></center>

<label><b>Child Full Name</b></label></br>
<input type="text" name="cname" class="text" placeholder="Enter First Name" size="70" /></br></br>

<label><b>Child Gender</b></label></br>
<input type="radio" name="cgender" value="Male" />Male
              	       <input type="radio" name="cgender" value="Female" />Female
</br></br>
<label ><b>Address</b></label></br>

<input type="text" name="ccity" class="text" placeholder="Enter your Address" size="70" />
</br></br>
<label ><b>Child Birth Date </b></label></br>
	<input type="date" name="cbirth" />
</br></br>

<label><b>Child Age </b></label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
<label><b>Child Weight </b></label>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
<label><b>Child Height </b></label><br>
	
<input type="number" name="cage" class="text" placeholder="Age" />
<input type="number" name="cweight" class="text" placeholder="Weight" />
<input type="number" name="cheight" class="text" placeholder ="Height" />
</br></br>

<label ><b>Add Vaccine</b></label></br>
<br>
<?php
	include 'database_connection.php';

	$query="SELECT * FROM vaccine";

	$result=mysqli_query($con,$query);

	while ($row = mysqli_fetch_array($result))
	{
		echo "<table>
				<tr>
					<td><input type='checkbox' name='chk[]' value='".$row['name']."' />".$row['name']."</td>
				</tr>
			  </table>";
	}
?>
<br>
<center><input type="Submit" name="addchild" value="Add child"/></center>

</div>

<?php

	if(isset($_POST['addchild']))
	{
		$con=mysqli_connect("localhost","root","","e_vaccination");

		$name = $_POST['cname'];
		$gen = $_POST['cgender'];
		$city = $_POST['ccity'];
		$birth = $_POST['cbirth'];
		$age = $_POST['cage'];
		$weight = $_POST['cweight'];
		$height = $_POST['cheight'];
		$chkval = implode(',',$_POST['chk']);
		
		$p_username = $_SESSION['username'];

		$query="INSERT INTO child VALUES('$name','$gen','$city','$birth',$age,$weight,$height,'$chkval','$p_username')";
		
		$result=mysqli_query($con,$query);

		if(!$result)
		{
			die("<br>Can't Insert Data : " .mysqli_error());
		}

		$vaccineval = $_POST['chk'];
		$date = date('Y-m-d');
		for($i=0; $i<count($vaccineval); $i++)
		{
				$query_vaccine = "SELECT * FROM vaccine ";
				$result_vaccine = mysqli_query($con,$query_vaccine);

				while($row_vaccine = mysqli_fetch_array($result_vaccine))
				{
					if($vaccineval[$i] == $row_vaccine['name'])
					{
						$time = strtotime($date);
						$final = date("Y-m-d", strtotime($row_vaccine['timing'], $time));
						$query_date = "INSERT INTO vaccine_dates VALUES('$vaccineval[$i]','$date','$final','$name','$p_username','false')";

						$result = mysqli_query($con,$query_date);
						if(! $result)
						{
							die('Could not insert Records: ' . mysqli_error());
						}
					}
				}
			
		}
				
		echo "<script>alert('Add Your Child Details..!!');window.location='parentindex.php'</script>";
	}
?>


</body>
</html>