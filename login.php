<?php
$server='localhost';
$user='root';
$pwd='';
$db='analyzerdb';
$conn=mysqli_connect($server,$user,$pwd,$db);
if(!$conn)
{
	die("Error ".mysqli_connect_error());
}
if(isset($_POST['loginbutton']))
{
	$username=$_POST['admin-name'];
	$password=$_POST['admin-pass'];
	if($username=='admin' && $password=='12345')
	{
		session_start();
		$_SESSION['admin-name']=$username;
		header('Location:admin.php');
	}
	else
	{
	  echo "<script type='text/javascript'>alert('Invalid Credentials');</script>";
	}
}
if(isset($_POST['logout']))
{
  session_start();
  unset($_SESSION['admin-name']);
  session_destroy();
  header('Location:index.php');
}
?>