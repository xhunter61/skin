<?php

require 'openid.php';

//include_once("db.php");

$_STEAMAPI = "";

try {
    $openid = new LightOpenID('loclhost:8080/skin/home.html');
    if(!$openid->mode) {
        if(isset($_GET['login'])) {
            $openid->identity = 'http://steamcommunity.com/openid/?l=english';
            header('Location: ' . $openid->authUrl());
        } else {
            echo "<h2>Connect to Steam</h2>";
            echo "<form action='?login' method='post'>";
            echo "<input type='image' src='http://cdn.steamcommunity.com/public/images/signinthroughsteam/sits_small.png'>";
            echo "</form>";
        }
    } elseif($openid->mode == 'cancel') {
        echo 'User has canceled authentication!';
    } else {
        if($openid->validate()) {
            $id = $openid->identity;
            $ptn = "/^http:\/\/steamcommunity\.com\/openid\/id\/(7[0-9]{15,25}+)$/";
            preg_match($ptn, $id, $matches);

            $url = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=$_STEAMAPI&steamids=$matches[1]";
            $json_object= file_get_contents($url);
            $json_decoded = json_decodemysql_select_db($json_object);

        foreach ($json_decoded->response->players as $player)
        {
                $sql_fetch_id = "SELECT * FROM users_steam WHERE steamid = $player->steamid";
                $query_id = mysqli_query($db, $sql_fetch_id);

                if (mysqli_num_rows($query_id) == 0) {
                    $sql_steam = "INSERT INTO users_steam (name, steamid, avatar) VALUES  ('$player->personaname', '$player->steamid', '$player->avatar')";
                    mysqli_query($db, $sql_steam);
                }
            }
        } else {
                        echo "User is not logged in.\n";
        }
    }
} catch(ErrorException $e) {
    echo $e->getMessage();
}
?>