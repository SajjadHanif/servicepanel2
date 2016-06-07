<?php

    require("config/config.php");
    require "vendor/autoload.php";

    use OpenTok\OpenTok;
    
    foreach ($_REQUEST as $key=>$value){
        
        $arr[] = explode(':',$key);
        
    }
    
    $clientName = $arr[0][1];

    $sessionId = $arr[1][1];

    //echo "SessionID: ".$sessionId." Token: ".$token;exit;

    $opentok = new OpenTok(API_KEY, API_SECRET);

    $token = $opentok->generateToken($sessionId);
    
    //print_r($sessionId);
    
    print_r($token);
    
    exit;

?>
