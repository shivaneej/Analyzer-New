<?php
	$servername = 'localhost';
    $username = 'root';
    $password = '';
    $db='analyzerdb';
    $conn = mysqli_connect($servername,$username,$password,$db);

    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
	$filename=$_GET['del_id'];
	$sql="DELETE FROM files_uploaded WHERE filename='".$filename."'";
	$result = mysqli_query($conn,$sql);
	unlink('uploads/'.$filename);
	header('Location:admin.php');
?>
