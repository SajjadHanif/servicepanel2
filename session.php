<?php
    
    session_start();
    
    require "vendor/autoload.php";

    use OpenTok\OpenTok;

    $apiKey = "45591762";

    $apiSecret = "ef909bf2fde9464daf9e9d293aeec7cff251ad7d";
    
    foreach ($_REQUEST as $key=>$value){
        
        $arr[] = explode(':',$key);
        
    }
    
    $clientName = $arr[0][1];

    $sessionId = $arr[1][1];

    //echo "SessionID: ".$sessionId." Token: ".$token;exit;

    $opentok = new OpenTok($apiKey, $apiSecret);

    $token = $opentok->generateToken($sessionId);
    
    print_r($token);
    
    exit;

?>
