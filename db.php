<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'users');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

$itemid=$_GET['itid'];

$sql="SELECT Endtime FROM itemlist WHERE Endtime IS NOT NULL AND itemid=".strval($itemid);


$result = mysql_query($sql); //$result is an array

$response = $result;

echo json_encode($response); 


$return_arr=array();

while($row = mysql_fetch_array($result))
  {
    $row_array['endtime']=$row['Endtime'];
    
    array_push($return_arr,$row_array);

  }

echo json_encode($return_arr);

mysql_close($con);

?>