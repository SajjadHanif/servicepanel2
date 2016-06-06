<?php

    require("servicepanel.php");

    $clientList = ServicePanel::getClientList();
    
    foreach ($_REQUEST as $key=>$value){
        
        $arr[] = explode(':',$key);
        
    }

    $clientName = $arr[0][1];
    
    $result = ServicePanel::removeClient($clientName);
        
    if($result){
    
        echo $clientName." Session Destroyed.";

        
    }
    else{
        
        echo $clientName." Session Doaes not Exist.";
    }
    
    exit;
    
?>
