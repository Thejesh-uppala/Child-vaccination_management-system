<?php 
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Parent Report</title>
</head>
<style>
  body {
    font-family: "Lato", sans-serif;
    background-size: cover;
    position: fixed;
    background: url('indexback.jpg');
  }

  .topnav {
    overflow: hidden;
    background-color: #A9CCE3;
  }

  .topnav a,label {
    float: left;
    color: black;
    text-align: left;
    padding: 14px 16px;
    text-decoration: none;
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
  	width: 1375px;
  	height: 600px;
  	margin: 30px 40px;
  	padding: 30px;
  }
  .btn{
      color:white;
      background:url('main1.svg');
      padding:10px 35px;
      text-align:center;
      vertical-align: middle;
      font-size:23px;
      border-radius:20px;
      width:15%;
      height:170px;
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
<a href= "addchild.php"><div class="btn"><img src="addchild.png" /><br>Add New Child</div></a>
<a href= "viewparentchild.php"><div class="btn"><img src="viewchild.png" /><br>View Child Details</div></a></br>
<a href= "vaccinereminder.php"><div class="btn"><img src="remainder.png" /><br>My Vaccine Reminder</div></a>
<br><br>
</center>
</div>
</body>
</html>