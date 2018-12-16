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

if(isset($_POST['logout']))
{
  session_start();
  unset($_SESSION['admin-name']);
  session_destroy();
  header('Location:index.php');
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
            <li><a href="index.php">Home</a></li>
             <li><a href="admin.php">Settings</a></li>
             <li style="float: right;"><form action="login.php" method="post">
                    <input type="submit" name="logout" value="Logout" class="logout">
                </form></li>
        </ul>
    </div></header>

    <section class="mainPanel" style="width: 100%;">
    <div class="upload">
        <a href="upload.php" style="text-decoration: none;"><button class="upload-button"> Upload Files</button></a>
    </div>

    <div class="history" style="transform: translateY(40%); width: 80%; margin: auto;" align="center">
        <div class="secHeading"><i class="fa fa-history" aria-hidden="true"></i> <font class="text" style="color: #08aeea;">Files you've uploaded</font></div>
            <div class="secMain">
                <table class="history" width="80%" cellspacing="20" cellpadding="5" align="center" style="overflow: hidden;">
                    <!--temporary-->
                   
                   
                    <?php

                    $sql = "SELECT filename, uploadtime FROM FILES_UPLOADED";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) 
                    {
                        while($row = mysqli_fetch_assoc($result)) 
                        {
                        echo  "<tr><td><font class='file-title'>" .$row['filename']."</font></td><td><font class='file-history'>".$row['uploadtime'] ."</font></td><td><a href='#' class='view-file'>View</a></td><td><i class='fa fa-trash delete-icon' aria-hidden='true'></i></td></tr>";
                        }
                    }

                    ?>
                        
                   
                

                </table>
                
                
                
            </div>
        </div>
    
        
    </section>

<script src="indexpage.js" type="text/javascript"></script>     
</body>
</html>
<?php
mysqli_close($conn);

?>