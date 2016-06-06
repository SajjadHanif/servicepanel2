<?php

    require "vendor/autoload.php";
    
    use OpenTok\OpenTok;
    
    $apiKey = "45567072";
    $apiSecret = "1e30613dbb3c2b8dcdb078505afe757d063fd5e5";
    
    $opentok = new OpenTok($apiKey, $apiSecret);
    
    $session = $opentok->createSession();
    
    $sessionId = $session->getSessionId();
    
    $token = $opentok->generateToken($sessionId);
    
    echo "SessionID: ".$sessionId." Token: ".$token;
    
?>

<script>

</script>