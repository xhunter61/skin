<?php

define('DB_HOST', 'eu-cdbr-west-01.cleardb.com');
define('DB_NAME', 'heroku_1ed81913353afff');
define('DB_USER','b16f3dd482fc76');
define('DB_PASSWORD','d96171c8');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

$sql="SELECT * from itemlist LEFT JOIN users ON itemlist.currentownerid=users.steamid WHERE itemactive=1";

$result = mysql_query($sql); //$result is an array

$response = $result;

echo json_encode($response); 


$return_arr=array();

while($row = mysql_fetch_array($result))
  {


    
    $row_array['itemname']=$row['Itemname'];
    $row_array['kondition']=$row['Kondition'];
    $row_array['imagelink']=$row['Imagelink'];
    $row_array['price']=$row['Price'];
    $row_array['steamprice']=$row['Steamprice'];
    $row_array['endtime']=$row['Endtime'];
    $row_array['itemid']=$row['itemid'];
    $row_array['currentprice']=$row['currentprice'];
    $row_array['avatar']=$row['avatar'];
    $row_array['steamname']=$row['steamname'];

    
    array_push($return_arr,$row_array);

  }

echo json_encode($return_arr);

mysql_close($con);

?>
