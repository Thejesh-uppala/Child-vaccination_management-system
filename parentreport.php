<!DOCTYPE html>
<html>
<head>
	<title>Parent Report</title>
</head>
<style>
	body{
		background-repeat: no-repeat;
		background-size: cover;
		background: url('reportback.jpg');
	}
	.bg1{
		opacity: 0.9;
		padding: 30px; 
		background-color: black; 
		width: 800px; 
	}

	.tabel_style{
		border-radius: 5px;
		border-style: solid;
		font-size: 22px;
		padding: 40px;
		text-align: center;
		color: white;
		font-family: Times New Roman;
	}
	p{
		font-size: 30px;
		color: white;
		background-color: #1A5276;
		padding: 10px;
		text-align: center;
		font-family: Times New Roman;
	}
</style>

<body >

<center>
<div class="bg1">
	<a href="report.php"><img src="backarrow.png" width="30" height="30"></a>
	<p>Parent Details</p>

	<?php
		include 'database_connection.php';

		$p_username = $_REQUEST['name'];
		$query = "SELECT * FROM parent WHERE p_username='$p_username'";

		$result = mysqli_query($con,$query);

		while ($row = mysqli_fetch_array($result)) {
		
	?>
	<table class="tabel_style" cellpadding="15" cellspacing="15">
		<tr>
			<th>User Name</th>
			<td><?php echo $row['p_username']; ?></td>
		</tr>

		<tr>
			<th>Last Name</th>
			<td><?php echo $row['p_lastname']; ?></td>
		</tr>

		<tr>
			<th>Gender</th>
			<td><?php echo $row['p_gender']; ?></td>
		</tr>

		<tr>
			<th>Address</th>
			<td><?php echo $row['p_city']; ?></td>
		</tr>

		<tr>
			<th>Birth Date</th>
			<td><?php echo $row['p_birth']; ?></td>
		</tr>

		<tr>
			<th>Email Address</th>
			<td><?php echo $row['p_email']; ?></td>
		</tr>
	</table>

	<?php
		}

		$p_username = $_REQUEST['name'];
		$query = "SELECT * FROM child WHERE p_username='$p_username'";

		$result = mysqli_query($con,$query);

		if(mysqli_num_rows($result) > 0)
		{
			echo "<p>Parent Child Details</p>";
			while ($row = mysqli_fetch_array($result)) {
			
		?>
		<table class="tabel_style" cellpadding="15" cellspacing="15">
			<tr>
				<th>Child Name</th>
				<td><?php echo $row['c_name']; ?></td>
			</tr>

			<tr>
				<th>Child Gender</th>
				<td><?php echo $row['c_gender']; ?></td>
			</tr>

			<tr>
				<th>Address</th>
				<td><?php echo $row['c_city']; ?></td>
			</tr>

			<tr>
				<th>Child Birth Date</th>
				<td><?php echo $row['c_birth']; ?></td>
			</tr>

			<tr>
				<th>Child Age</th>
				<td><?php echo $row['c_age']; ?></td>
			</tr>

			<tr>
				<th>Child Weight</th>
				<td><?php echo $row['c_weight']; ?></td>
			</tr>

			<tr>
				<th>Child Height</th>
				<td><?php echo $row['c_height']; ?></td>
			</tr>

			<tr>
				<th>Vaccines</th>
				<td><?php echo $row['c_vaccine']; ?></td>
			</tr>
		</table>

		<?php
			}
		}
		else
			echo "<p> No Any Child Register For This Parent!";

		$p_username = $_REQUEST['name'];
		$query = "SELECT * FROM vaccine_dates WHERE p_username='$p_username'";

		$result = mysqli_query($con,$query);

		if(mysqli_num_rows($result) > 0)
		{
			echo "<p>Parent Child Vaccine Report</p>";
			while ($row = mysqli_fetch_array($result)) {
			
		?>
		<table class="tabel_style" cellpadding="15" cellspacing="15">
			<tr>
				<th>Vaccine Name</th>
				<td><?php echo $row['name']; ?></td>
			</tr>

			<tr>
				<th>Start Date</th>
				<td><?php echo $row['v_date']; ?></td>
			</tr>

			<tr>
				<th>Vaccine Date</th>
				<td><?php echo $row['timing']; ?></td>
			</tr>

			<tr>
				<th>Status</th>

				<td><?php 
					if($row['status'] == 'false'){
						echo "Not Allocated";
					}
					else{
						echo "Allocated";
					}
						 ?></td>
			</tr>

		</table>

		<?php
			}
		}
		else
			echo "<p> No Any Parent Child Vaccine";
		?>

</div>
</center>
</body>
</html>