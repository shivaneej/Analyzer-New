<?php
error_reporting(E_ERROR | E_PARSE);
date_default_timezone_set("Asia/Calcutta");
$target_dir = "uploads/";

 $servername = 'localhost';
    $username = 'root';
    $password = '';
    $db='analyzerdb';
    $conn = mysqli_connect($servername,$username,$password,$db);
    
    if (!$conn) 
        {
            die("Connection failed: " . mysqli_connect_error());
        }

$total = count($_FILES['fileup']['name']);

for($i=0; $i<$total; $i++)
{

    $filename=$_FILES['fileup']['name'][$i]; 
    $targetfile=$target_dir.basename($_FILES['fileup']['name'][$i]); 
    $uploadstatus=1;
    $filetype=strtolower(pathinfo($targetfile,PATHINFO_EXTENSION));  
    
        if($filetype!='csv')
        {
            $uploadstatus=0;
        }
        else
        {
            $uploadstatus=1;
        }

     
        if(file_exists($targetfile))
        {
            $tablename =  basename($targetfile,".csv");
            $sql = "DROP TABLE ".$tablename;
            mysqli_query($conn,$sql);
            $sql = "DELETE FROM FILES_UPLOADED WHERE filename = '".$_FILES['fileup']['name'][$i]."'";
            mysqli_query($conn,$sql);
        }
       
            if($uploadstatus==1) 
                {
                    if (move_uploaded_file($_FILES['fileup']['tmp_name'][$i],$targetfile)) 
                        {
                            
                            $tablename =  basename($targetfile,".csv");
                            $datetime=date("Y/m/d h:i:sa");
                            $file = fopen($targetfile, "r");
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
                          
    
            if($uploadstatus==1)   
                {
                    $sql = "INSERT INTO FILES_UPLOADED VALUES ('$filename','$datetime');";
 
                    if(mysqli_query($conn,$sql))
                        {
                           
                        } 
                }
    

        

}
mysqli_close($conn);
header("Location: admin.php");
?>

