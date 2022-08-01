<!DOCTYPE html>
<html>
<head>
	<title>Allocate Vaccine</title>
</head>
<style>
	body{
		font-family: "Lato", sans-serif;
	  	background-size: cover;
	  	position: fixed;
	  	background: url('allocateback.jpg');
	}
	.bg{
		opacity: 0.7;
		background-color: black;
		width: 1375px;
		height: 600px;
		margin: 30px 40px;
		padding: 30px;
		overflow: auto;
	}
	.tabel_style{
		background-color: white;
		border-radius: 5px;
		border-style: solid;
		font-size: 20px;
		padding: 20px;
		text-align: center;
		width: 1360px;
	}
	p{
		text-align: center;
		color: white;
		font-size: 30px;
	}
	.td{
		background-color: #1D4967;
		color: white;
		border-radius: 10px;
	}
	.td_allocate{
		background-color: black;
		color: white;
		padding: 20px;
		border-radius: 10px;
	}
	.a{
		text-decoration: none;
		color: white;
		background-color: red;
		padding: 20px;
		width: max-content;
		border-radius: 0px;
	}
	td{
		padding: 40px;
	}
	p{
		text-align: center;
		color: white;
		font-size: 35px;
		font-family: Times New Roman;	
	}
	.td1{
		color:red
	}
</style>
<body>

<div class="bg">
<a href="adminindex.php"><img src="backarrow.png" width="30" height="30"></a></br>	
	<?php

		include 'database_connection.php';

		$query = "SELECT * FROM vaccine_dates";
		$result = mysqli_query($con,$query);

		if(mysqli_num_rows($result) > 0)
		{
			echo "<table cellspacing='6' cellpadding='6' class='tabel_style'>

				  <tr>
				  		<th>Child Name</th>
						<th>parent Name</th>
				  		<th>Vaccine Name</th>
				  		<th>Start Vaccine Date</th>
				  		<th>Vaccine Remainder</th>
						<th>Status</th>
				  		<th></th>
				  </tr>";

			while ($row = mysqli_fetch_array($result)) {
				
				if($row['status'] == 'false'){
					echo "<tr>
							<td>".$row['c_name']."</td>
							<td>".$row['p_username']."</td>
							<td>".$row['name']."</td>
							<td>".$row['v_date']."</td>
							<td class='td'>".$row['timing']."</td>
							<td><a href='updatevaccine.php?c_name=".$row['c_name']."&vaccine_n=".$row['name']."'><img src='done.png' width='45' height='45' /></a></td>
							</tr>";
				}
				else{
					echo "<tr>
							<td class='td_allocate'>".$row['c_name']."</td>
							<td class='td_allocate'>".$row['p_username']."</td>
							<td class='td_allocate'>".$row['name']."</td>
							<td class='td_allocate'>".$row['v_date']."</td>
							<td class='td_allocate'>".$row['timing']."</td>
							<td class='td_allocate'>Allocated</td>
							</tr>";
				}
			}

			echo "</table>";
		}
		else
			echo "<p>No Any Dates Available !</p>";
	?>

// parent list
<div class="td1">
<?php

		include 'database_connection.php';

		$query = "SELECT * FROM vaccine_dates where status='true'";
		$result = mysqli_query($con,$query);

		if(mysqli_num_rows($result) > 0)
		{
			echo "<table cellspacing='6' cellpadding='6' class='tabel_style'>

				  <tr>
						<th>child Name</th>
						<th>parent Name</th>
				  </tr>";

			while ($row = mysqli_fetch_array($result)) {
				
				if($row['status'] == 'false'){
					echo "<tr>
							<td>".$row['c_name']."</td>
							<td>".$row['p_username']."</td>
						</tr>";
				}
				else{
					echo "<tr>
							<td class='td_allocate'>".$row['c_name']."</td>
							<td class='td_allocate'>".$row['p_username']."</td>
							</tr>";
				}
			}

			echo "</table>";
		}
		else
			echo "<p>No Any Dates Available !</p>";
	?>
</div>


<?php
	include 'database_connection.php';

	$query="SELECT * FROM child";

	$result=mysqli_query($con,$query);

	if(mysqli_num_rows($result) > 0)
	{
		echo "<p>Child's parents list</p>";
		echo "<table class='tabel_style'>";

		while ($row = mysqli_fetch_array($result))
		{
			echo "	<tr>
						<td><a href='parentreport.php?name=".$row['p_username']."' class='a'>".$row['p_username']."</a></td>
					</tr>
				  ";
		}
		echo "</table>";
	}
	else
		echo "<p>No Any Parent !</p>";
?>
</div>
</body>
</html>