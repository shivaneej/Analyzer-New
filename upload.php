<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$db='analyzerdb';
session_start();
$conn = mysqli_connect($servername,$username,$password,$db);
    
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}
if(!isset($_SESSION['admin-name']))
{
    echo '<script type="text/javascript">alert("Log in to continue"); window.location="index.php";</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Analyzer</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="background">
	<!--navigation bar-->
	<header><div class="navbar">
		<ul>
			<li><img src="https://bucket.mlcdn.com/a/1192/1192164/images/c9b0cfe3970c4a7ab4c0b3ac6ce5f57a0b55117b.png" class="logo"></li> 
			<!--Continuous improvement-->
  			<li><a href="index.php?logged">Home</a></li>
  			<li><a href="admin.php">Settings</a></li>
  			<!--login-->
  			<li style="float: right;"><form action="login.php" method="post">
                    <input type="submit" name="logout" value="Logout" class="logout">
                </form></li>
		</ul>
	</div></header>

	<section class="mainPanel" style="width: 100%;">
		<div class="top" style="display: inline; padding: 10px;">
			<form action="uploadfile.php" enctype="multipart/form-data" method="POST">
		</div>

			<div class="regular-result" align="center" style="width: 80%; margin: auto; height: auto; padding-top: 2%;">
				<div class="secHeading"><font class="text" style="color: #08aeea;">Upload Results</font></div>
				<div class="secMain" style="padding: 2%; margin: auto;" align="center">
					<div class="instruction">
						<div class="tooltip"><i class="fa fa-info-circle" aria-hidden="true" style="color: #08aeea;"></i>
  							<span class="tooltiptext"> Save your excel files by clicking save as and choose the save as type to be CSV(Comma delimited)(*.csv)</span>
						</div>
						<font class="light">Please upload only .csv files.</font>
					</div>
				
					<div class="upload"><strong>F.E. </strong> <input class="files" type="file" name="fileuploaded1"></div>
					<div class="upload"><strong>S.E. </strong> <input class="files" type="file" name="fileuploaded2"></div>
					<div class="upload"><strong>T.E. </strong> <input class="files" type="file" name="fileuploaded3"></div>
					<div class="upload"><strong>B.E. </strong> <input class="files" type="file" name="fileuploaded4"></div>
						
  			</div>
		</div>	

		<div class="kt-result" align="center" style="width: 80%; margin: auto; height: auto; padding-top: 2%;">
				<div class="secHeading"><font class="text" style="color: #08aeea;">Upload KT Results</font></div>
				<div class="secMain" style="padding: 2%; margin: auto;" align="center">
					<div class="instruction">
						<div class="tooltip"><i class="fa fa-info-circle" aria-hidden="true" style="color: #08aeea;"></i>
  							<span class="tooltiptext"> Save your excel files by clicking save as and choose the save as type to be CSV(Comma delimited)(*.csv)</span>
						</div>
						<font class="light">Please upload only .csv files.</font>
					</div>
					
						<div class="upload"><strong>F.E. </strong> <input class="files" type="file" name="fileuploaded5"></div>
					<div class="upload"><strong>S.E. </strong> <input class="files" type="file" name="fileuploaded6"></div>
					<div class="upload"><strong>T.E. </strong> <input class="files" type="file" name="fileuploaded7"></div>
					<div class="upload"><strong>B.E. </strong> <input class="files" type="file" name="fileuploaded8"></div>
					</div>
					<input type="submit" name="submitfileup" value="Confirm" class="confirm-button" style="padding: 1%; margin-top: 2% ;width: 20% ">
					<br>
					</form>
					
  			
		</div>

	
	</section>

<script src="indexpage.js" type="text/javascript"></script> 	
</body>
</html>