<?php
//Version 3.1.1
$steamauth['apikey'] = "C8A09C6806D2705F00B34B32A16A9850"; // Your Steam WebAPI-Key found at http://steamcommunity.com/dev/apikey
$steamauth['domainname'] = "skinbasar.herokuapp.com"; // change to localhost:8080
$steamauth['logoutpage'] = "home.php"; // Page to redirect to after a successfull logout (from the directory the SteamAuth-folder is located in) - NO slash at the beginning!
$steamauth['loginpage'] = "home.php"; // Page to redirect to after a successfull login (from the directory the SteamAuth-folder is located in) - NO slash at the beginning!

// System stuff
if (empty($steamauth['apikey'])) {die("<div style='display: block; width: 100%; background-color: red; text-align: center;'>SteamAuth:<br>Please supply an API-Key!</div>");}
if (empty($steamauth['domainname'])) {$steamauth['domainname'] = $_SERVER['SERVER_NAME'];}
if (empty($steamauth['logoutpage'])) {$steamauth['logoutpage'] = $_SERVER['PHP_SELF'];}
if (empty($steamauth['loginpage'])) {$steamauth['loginpage'] = $_SERVER['PHP_SELF'];}
?>
