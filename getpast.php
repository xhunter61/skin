<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'itemlist');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
$db=mysqli_select_db($con,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());

$sql="SELECT * from itemlist LEFT JOIN users ON itemlist.currentownerid=users.steamid WHERE itemactive=1";

$result = mysqli_query($con,$sql); //$result is an array

$response = $result;

//echo json_encode($response); 


$return_arr=array();

while($row = mysqli_fetch_array($result))
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

mysqli_close($con);

?>
