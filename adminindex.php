<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style>
  body {
    font-family: "Lato", sans-serif;
    background-size: cover;
    position: auto;
    background: url('indexback.jpg');
  }
  .topnav {
    overflow: hidden;
    background-color: white;
  }

  .topnav a,label {
    	float: left;
    	color: black;
    	text-align: right;
    	padding: 14px 16px;
    	text-decoration: solid;
    	font-size: 17px;

  }
  .topnav a:hover {
    background-color: yellow;
    color: #A9CCE3;
  }

  .topnav a.active {
    background-color: #A9CCE3;
    color: white;
  }
  .bg{
  	opacity: 0.9;
  	background: url('river.jpg');
  	width: 1370px;
  	height: 600px;
  	margin: 30px 40px;
  	padding: 30px;
  }
  .btn{
      color:white;
      background:black;
      padding:35px;
      text-align:center;
      vertical-align: middle;
      font-size:23px;
      border-radius:20px;
      width:15%;
      height:150px;
      margin:10px;
      display:inline-block;
      box-shadow: 6px 6px #A9CCE3;
  }
  .topnav1 {
    overflow: hidden;
    background-color: black;
  }
</style>
<body>

<div class="topnav">
  <label ><?php echo $_SESSION['username']; ?></label>
  <a href="logout.php">Logout</a>
</div>
<div class="topnav1">
<br>
</div>

<div class="bg">
<center>
<a href= "viewchild.php"><div class="btn"><img src="viewchild.png" /><br>View Child Details</div></a>
<br>
<a href= "addvaccine.php"><div class="btn"><img src="addvaccine.png" /><br>Add vaccine</div></a><br>
<a href= "allocate_vaccine.php"><div class="btn"><img src="report.png" /><br>Allocat Vaccine</div></a>
<a href= "report.php"><div class="btn"><img src="report.png" /><br>View Report</div></a>
</center>
</div>

</body>
</html>