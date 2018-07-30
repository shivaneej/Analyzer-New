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
            <li><a href="index.php?loggedin">Home</a></li>
            <!--login-->
            <li style="float: right;"><a href="index.php?logout"><i class="fa fa-user" aria-hidden="true"></i> Logout </a></li>
        </ul>
    </div></header>

    <section class="mainPanel" style="width: 100%;">
        <div id="change-password-modal" class="modal">
            <div class="modal-content" style="max-width:500px">
                <span onclick="document.getElementById('change-password-modal').style.display='none'" class="close" title="Close Modal">&times;</span>
                <br><br>
                <form action="#" method="post">
                    <p><input type="password" name="currentPass" placeholder="Enter Current Password" id="password-box" class="input-box" required></p>
                    <p><input type="password" name="newPass" placeholder="Enter New Password" id="password-box" class="input-box" required></p>
                    <p><input type="password" name="newPassConfirm" placeholder="Retype New Password" id="password-box" class="input-box" required></p>
                    <p><input type="submit" name="changebutton" value="Change Password" class="button" style="padding-top: 10px; padding-bottom: 10px; "></p>
                </form>
            </div>
        </div>
    <div class="settings" align="center" style="width: 80%; margin: auto; height: auto;">
        <div class="secHeading"><i class="fa fa-cog" aria-hidden="true"></i> <font class="text" style="color: #08aeea;">Settings</font></div>
            <div class="secMain" style="padding: 10px;">
                <p class="text" align="center">Username: 
                <input id="change-name-box" type="text" name="change-username" placeholder="admin" disabled >
                <button class="edit" id="changeName" onclick="javascript:change_username();"> <i class="fa fa-pencil" aria-hidden="true"></i> </button>
                <button class="edit" id="saveName"> <i class="fa fa-check" aria-hidden="true"></i></button>
                </p> 
                <br>
                <div class="changePassword" align="center">  
                    <button class="button" id="change-password" onclick="javascript:showModal();">Change Password</button>
                </div>
            </div>
        </div>

    <div class="upload">
        <a href="upload.html" style="text-decoration: none;"><button class="upload-button"> Upload Files</button></a>
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