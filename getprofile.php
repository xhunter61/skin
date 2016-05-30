<?php
require ('steamauth/steamauth.php'); 
include ('steamauth/userInfo.php');

define('DB_HOST', 'localhost');
define('DB_NAME', 'itemlist');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
$db=mysqli_select_db($con,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());

$sql="SELECT * from itemlist WHERE itemactive=1 AND currentownerid='".$steamprofile["steamid"]."'";

$result = mysqli_query($con,$sql); //$result is an array

$response = $result;

//echo json_encode($response); 


$return_arr=array();

while($row = mysqli_fetch_array($result))
  {


    
    $row_array['Weapon']=$row['Itemname'];
    $row_array['Skin']=$row['Kondition'];
    $row_array['Wear']=$row['Steamprice'];
    $row_array['Price']=$row['currentprice'];
    $row_array['Name']=$row['paid'];
    $row_array['Itemid']=$row['itemid'];

    
    array_push($return_arr,$row_array);

  }

echo json_encode($return_arr);

mysqli_close($con);

?>
