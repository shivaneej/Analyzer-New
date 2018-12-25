<?php
$server='localhost';
$username='root';
$pwd='';
$db='demo';
$conn=mysqli_connect($server,$username,$pwd,$db);
if(!$conn)
{
	die("Connection error ".mysqli_connect_error());
}

$sql1='SELECT count(pointer) as count FROM pie WHERE pointer>9';
$sql2='SELECT count(pointer) as count FROM pie WHERE pointer BETWEEN 8 AND 9';
$sql3='SELECT count(pointer) as count FROM pie WHERE pointer BETWEEN 7 AND 8';
$sql4='SELECT count(pointer) as count FROM pie WHERE pointer BETWEEN 6 AND 7';
$sql5='SELECT count(pointer) as count FROM pie WHERE pointer<6';

$json_response = array(); 

$result1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_assoc($result1);

$result2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_assoc($result2);

$result3=mysqli_query($conn,$sql3);
$row3=mysqli_fetch_assoc($result3);

$result4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_assoc($result4);

$result5=mysqli_query($conn,$sql5);
$row5=mysqli_fetch_assoc($result5);

$string = '{"cols": [
                      {"id":"","label":"Grade","pattern":"","type":"string"},
                      {"id":"","label":"Count","pattern":"","type":"number"}
                    ],
            "rows": [
                      {"c":[{"v":"A","f":null},{"v":'.$row1['count'].',"f":null}]},
                      {"c":[{"v":"B","f":null},{"v":'.$row2['count'].',"f":null}]},
                      {"c":[{"v":"C","f":null},{"v":'.$row3['count'].',"f":null}]},
                      {"c":[{"v":"D","f":null},{"v":'.$row4['count'].',"f":null}]},
                      {"c":[{"v":"E","f":null},{"v":'.$row5['count'].',"f":null}]}
                    ]
          }';

echo $string;

?>
