<?php
error_reporting(E_ERROR | E_PARSE);
date_default_timezone_set("Asia/Calcutta");
$target_dir = "uploads/";
$filenames = array();
$targetfiles = array();
$uploadstatus=array();
$filetypes=array();
$datetime=array();
$semselected =$_POST['sem_upload'];
$acyearselected = $_POST['academic_year_upload']; 
for ($x=0; $x <8 ; $x++) 
{ 
    $filenames[$x]=$_FILES['fileuploaded'.($x+1)]['name']; 
    $targetfiles[$x]= $target_dir . basename($_FILES['fileuploaded'.($x+1)]['name']); 
    $uploadstatus[$x]=1;
    $filetypes[$x]=strtolower(pathinfo($targetfiles[($x)],PATHINFO_EXTENSION));
}

if(isset($_POST['submitfileup']))
{
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

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $db='analyzerdb';
    $conn = mysqli_connect($servername,$username,$password,$db);
    
    if (!$conn) 
        {
            die("Connection failed: " . mysqli_connect_error());
        }

    for($x=0;$x<8;$x++)
    {
        if(file_exists($targetfiles[$x]))
        {
            $tablename =  basename($targetfiles[$x],".csv");
            $sql = "DROP TABLE ".$tablename;
            mysqli_query($conn,$sql);
            $sql = "DELETE FROM FILES_UPLOADED WHERE filename = '".$_FILES['fileuploaded'.($x+1)]['name']."'";
            mysqli_query($conn,$sql);
        }
    }

   


    for ($x=0; $x <8 ; $x++)
        {
            if($uploadstatus[$x]==1) 
                {
                    if (move_uploaded_file($_FILES['fileuploaded'.($x+1)]['tmp_name'], $targetfiles[$x])) 
                        {
                            $tablename =  basename($targetfiles[$x],".csv");
                            $datetime[$x]=date("Y/m/d h:i:sa");
                            $file = fopen($targetfiles[$x], "r");
                            $create = "CREATE TABLE ".$tablename." (";
                            $sql="";
                            $attr = fgetcsv($file);
                            for($z=0;$z<count($attr);$z++)
                                {
                                    $sql =$sql."$attr[$z] varchar(255),";
                                }
                            $newsql=rtrim($sql,", ");
                            $sql = $create.$newsql.")"; 
                            if(mysqli_query($conn,$sql))
                                {
                                    
                                }

                            while(!feof($file))
                                {
                                    $sql="";
                                    $ys = "INSERT INTO " .$tablename." VALUES (";
                                    $tuples = fgetcsv($file);
                                    for($y=0;$y<count($tuples);$y++)
                                        {
                                            $sql =$sql."'$tuples[$y]',";
                                        }
                                    $newsql=rtrim($sql,", ");
                                    $sql = $ys.$newsql.")";
                                    if(mysqli_query($conn,$sql))
                                        {
                                            
                                        }
                                }
                            fclose($file);    
                        }
                }
        }                    


    for($x=0;$x<8;$x++)
        {
            if($uploadstatus[$x]==1)   
                {
                    $sql = "INSERT INTO FILES_UPLOADED VALUES ('$filenames[$x]','$datetime[$x]');";
 
                    if(mysqli_query($conn,$sql))
                        {
                           
                        } 
                }
        }

        
}
mysqli_close($conn);
header("Location: admin.php");
?>

