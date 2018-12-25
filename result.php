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
	 <div class="navbar">
    <ul>
      <li><img src="https://bucket.mlcdn.com/a/1192/1192164/images/c9b0cfe3970c4a7ab4c0b3ac6ce5f57a0b55117b.png" class="logo"></li> 
          <?php
          session_start();
          if(!isset($_SESSION['admin-name']))
          {
            echo '<div class="dropdown" style="float: right;"><li class="dropdown"><button class="dropbutton" onclick="LogIn()"><i class="fa fa-user" aria-hidden="true"></i>  Admin Login</button>
          <!--dropdown for login-->
        <div class="dropdown-content" id="login">
          <form class="login-form" style="width: 100%" method="post" action="login.php">
            <p><input type="text" name="admin-name" placeholder="Enter Username" id="username-box" class="input-box" required></p>
            <p><input type="password" name="admin-pass" placeholder="Enter Password" id="password-box" class="input-box" required></p>
            <p class="text" align="left" style="color: white;"><input type="checkbox" onclick="showPassword()"> Show Password</p>
                  <p><input type="submit" name="loginbutton" value="Log In" class="button"></p>
          </form>
        </div></li></div>';
          }

          else
          {
            echo ' <li><a href="admin.php">Dashboard</a></li>
             <li style="float: right;"><form action="login.php" method="post">
            <input type="submit" name="logout" value="Logout" class="logout">
          </form></li>';
          }
          ?>

          
    </ul>
  </div>

<script src="indexpage.js" type="text/javascript"></script> 
</body>
</html>
<?php
if($_POST['sem']=='yearly')
{
  $yr = $_POST['academic_year']."_".$_POST['year'];
  
}
else
{


$srch = $_POST['academic_year']."_".$_POST['year']."_".$_POST['sem']; 
echo $srch;

$servername = 'localhost';
    $username = 'root';
    $password = '';
    $db='analyzerdb';
    $conn = mysqli_connect($servername,$username,$password,$db);
    
    if (!$conn) 
        {
            die("Connection failed: " . mysqli_connect_error());
        }
if($_POST['option']=='overall')
{

$sql = "SELECT DISTINCT pointer FROM ".$srch." ORDER BY pointer DESC";

$res = mysqli_query($conn,$sql);
if($res)
{
 for($i=1; $i<=5; $i++)
 {
  $row = mysqli_fetch_assoc($res);
  $sql1 = "SELECT seat_no,name,pointer FROM ".$srch." WHERE pointer = ".$row['pointer']."";
  $res1 = mysqli_query($conn,$sql1);
  while($row1 = mysqli_fetch_assoc($res1))
  {
    echo $i." ".$row1['seat_no']." ".$row1['name']." ".$row1['pointer']."<br><br>";
  }

 }
}
else
{
  die("No results found");
}
}
else
{
  $sub = $_POST['subject'];
  $sql = "SELECT DISTINCT ".$sub."_total  FROM ".$srch." ORDER BY ".$sub."_total DESC";
  $res = mysqli_query($conn,$sql);
if($res)
{
 for($i=1; $i<=5; $i++)
 {
  $row = mysqli_fetch_assoc($res);
  $sql1 = "SELECT seat_no,name, ".$sub."_total FROM ".$srch." WHERE ".$sub."_total = ".$row[$sub.'_total']."";
  $res1 = mysqli_query($conn,$sql1);
  while($row1 = mysqli_fetch_assoc($res1))
  {
    echo $i." ".$row1['seat_no']." ".$row1['name']." ".$row1[$sub.'_total']."<br><br>";
  }

 }
}

}
}




?>