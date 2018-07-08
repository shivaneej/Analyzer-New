<?php
date_default_timezone_set("Asia/Calcutta");
$target_dir = "uploads/";
$filenames = array();
$targetfiles = array();
$uploadstatus=array();
$filetypes=array();
$datetime=array();
for ($x=0; $x <8 ; $x++) { 
$filenames[$x]=$_FILES['fileuploaded'.($x+1)]['name']; 
$targetfiles[$x]= $target_dir . basename($_FILES['fileuploaded'.($x+1)]['name']); 
$uploadstatus[$x]=1;
$filetypes[$x]=strtolower(pathinfo($targetfiles[($x)],PATHINFO_EXTENSION));
}
if(isset($_POST['submitfileup']))
for ($x=0; $x <8 ; $x++)
{
    if($filetypes[$x]!='csv')
    {
        $uploadstatus[$x]=0;
    }
    else
    {
        $uploadstatus[$x]=1;
    }

}
for ($x=0; $x <8 ; $x++)
{
   if (file_exists($targetfiles[$x])) {
    $uploadstatus[$x] = 0;
}
}

for ($x=0; $x <8 ; $x++)
{
   if($uploadstatus[$x]==1) {
    if (move_uploaded_file($_FILES['fileuploaded'.($x+1)]['tmp_name'], $targetfiles[$x])) {
        //echo "The file ". basename( $_FILES['fefileuploaded']['name']). " has been uploaded.";
        $datetime[$x]=date("Y/m/d h:i:sa");
    } else {
        //echo "Sorry, there was an error uploading your file.";
    }

}
}



$servername = 'localhost';
$username = 'root';
$password = '';
$db='analyzer project';
$conn = mysqli_connect($servername,$username,$password,$db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

for($x=0;$x<8;$x++)
{
    if($uploadstatus[$x]==1){
        $sql = "INSERT INTO FILES_UPLOADED VALUES ('$filenames[$x]','$datetime[$x]');";
 
if(mysqli_query($conn,$sql))
{
    echo 'yess';
}   
else
{
    echo 'fuck';
    }
}
}

mysqli_close($conn);

?>