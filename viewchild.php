<!DOCTYPE html>
<html>
<head>
	<title>View Child Details</title>
</head>

<style>
	body {
	  font-family: "Lato", sans-serif;
	  background-size: cover;
	  position: auto;
	  background: url('indexback.jpg');
	  width: auto;
	}
	div{
		opacity: 0.7;
		background-color: black;
		width: 1400px;
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
		width: auto;
	}
	p{
		color: white;
		text-align: center;
		vertical-align: middle;
		font-size: 30px;
	}

</style>

<body>

<div>
<a href="adminindex.php"><img src="backarrow.png" width="30" height="30"></a></br>	

<table class="tabel_style" cellspacing="5" cellpadding="5" >


<?php
	include 'database_connection.php';

	$query="SELECT * FROM child";

	$result = mysqli_query($con,$query);

	if(mysqli_num_rows($result) > 0){
		echo "<tr>
				<th>Name</th>
				<th>Gender</th>
				<th>Birth Date</th>
				<th>City</th>
				<th>Age</th>
				<th>Weight</th>
				<th>Height</th>
				<th>Vaccine</th>
				<th></th>
				<th></th>
			</tr>";

		while ($row = mysqli_fetch_array($result)) {
			echo "<tr>
					<td>".$row['c_name']."</td>
					<td>".$row['c_gender']."</td>
					<td>".$row['c_birth']."</td>
					<td>".$row['c_city']."</td>
					<td>".$row['c_age']."</td>
					<td>".$row['c_weight']."</td>
					<td>".$row['c_height']."</td>
					<td>".$row['c_vaccine']."</td>				
					<td><a href='deletechild.php?c_name=".$row['c_name']."'>
					<text>Delete<text><br>
					<img src='delete.png'width='35' height='35'/></a>
					</td>
				  </tr>";
		}
	}
	else{
		echo "<p>No Any Child Details !</p>";
	}

?>

</table>
</div>
</body>
</html>