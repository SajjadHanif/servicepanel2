<?php

    require("config/config.php");

    foreach ($_REQUEST as $key=>$value){
        
        $arr[] = explode(':',$key);
        
    }

    $clientName = $arr[0][1];
    
    $result = $redis->hdel("ClientList",$clientName);
        
    if($result){
    
        echo $clientName." Session Destroyed.";

        
    }
    else{
        
        echo $clientName." Session Doaes not Exist.";
    }
    
    exit;
    
?>
