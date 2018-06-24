<?php
if(isset($_POST['loginbutton']))
{
session_start();
$username=$_POST['admin-name'];
$password=$_POST['admin-pass'];
if($username=='admin' && $password=='12345')
{
$_SESSION['admin-name']=$username;
header('Location:admin.html');
}
else{
  require 'index.html';
  $message = "Invalid Credentials!\\nTry again.";
  echo "<script type='text/javascript'>alert('$message');</script>";
}
}
if(isset($_GET['logout'])){
  session_start();
  session_destroy();
  require 'index.html';
}
?> 