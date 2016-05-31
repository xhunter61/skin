<?php
//connecting to the database
define('DB_HOST', 'eu-cdbr-west-01.cleardb.com');
define('DB_NAME', 'heroku_1ed81913353afff');
define('DB_USER','b16f3dd482fc76');
define('DB_PASSWORD','d96171c8');

$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysqli_select_db($con,DB_NAME) or die("Failed to connect to MySQL: " . mysql_error());
//inserting Record to the database
$itemname = $_POST['itemname'];
$kondition = $_POST['kondition'];
$imglink =  $_POST['imglink'];
$price = $_POST['price'];
$steamprice = $_POST['steamprice'];
$endtime =  $_POST['endtime'];
$itemid =  $_POST['itemid'];


$query = "INSERT INTO `itemlist`(`Itemname`, `Kondition`, `Imagelink`, `Price`, `Steamprice`, `Endtime`) VALUES ('$itemname','$kondition','$imglink','$price','$steamprice','$endtime')";
$result = mysqli_query($con,$query);
if($result)
	{
	    echo "Successfully updated database";
	}
	else
	{

	}
	mysqli_close($con);
?>
