<?php
//connecting to the database
define('DB_HOST', 'localhost');
define('DB_NAME', 'itemlist');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
//inserting Record to the database
$itemname = $_POST['itemname'];
$kondition = $_POST['kondition'];
$imglink =  $_POST['imglink'];
$price = $_POST['price'];
$steamprice = $_POST['steamprice'];
$endtime =  $_POST['endtime'];
$itemid =  $_POST['itemid'];


$query = "INSERT INTO `itemlist`(`Itemname`, `Kondition`, `Imagelink`, `Price`, `Steamprice`, `Endtime`) VALUES ('$itemname','$kondition','$imglink','$price','$steamprice','$endtime')";
$result = mysql_query($query);
if($result)
	{
	    echo "Successfully updated database";
	}
	else
	{
	 die('Error: '.mysql_error($con));
	}
	mysql_close($con);
?>