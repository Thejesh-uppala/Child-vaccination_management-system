<?php

	include 'database_connection.php';

	if($_POST['uname'] && $_POST['pass'])
	{
		session_start();
		
		$uname=$_POST['uname'];
		$password=$_POST['pass'];
		$type=$_POST['utype'];

		if($type=='Admin')
			admin($uname,$password,$con);
		else
			parents($uname,$password,$con);
	}
	
	function admin($uname,$password,$con)
	{
		$query="SELECT username,pass FROM admin WHERE username='$uname'";
		
		$result=mysqli_query($con,$query);
		
		if(!$result)
		{	
			die("Can't Found : ".mysqli_error());
		}
		else
		{
			$row=mysqli_fetch_row($result);
			list($aname,$apass)=$row;

			if($uname==$aname && $password==$apass)
			{
				$_SESSION['username']=$uname;
				$_SESSION['type']='Admin';
				header("location:adminindex.php");
			}
			else
			{
				$_SESSION['msg']="<b>INVALID USER</b>";
				header("location:index.php");
			}
		}
	}

	function parents($uname,$password,$con)
	{
		$query="SELECT p_username,p_pass FROM parent WHERE p_username='$uname'";
		
		$result=mysqli_query($con,$query);
		
		if(!$result)
		{	
			die("Can't Found : ".mysqli_error());
		}
		else
		{
			$row=mysqli_fetch_row($result);
			list($aname,$apass)=$row;

			if($uname==$aname && $password==$apass)
			{
				$_SESSION['username']=$uname;
				$_SESSION['type']='parent';
				header("location:parentindex.php");
			}
			else
			{
				$_SESSION['msg']="INVALID USER";
				header("location:index.php");
			}
		}
	}	
?>
