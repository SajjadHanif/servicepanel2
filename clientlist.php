<?php

    require("config/config.php");

    $clientList = $redis->hgetall("ClientList");

    $jsonClientList = json_encode($clientList);
   
   //print_r($clientList);
   
   print_r($jsonClientList);

?>
