
<?php

    require_once ("servicepanel.php");
    require("config.php");
    require "vendor/autoload.php";
    
    use OpenTok\OpenTok;
    
    $opentok = new OpenTok(API_KEY, API_SECRET);
    
    $clientName   = str_replace(" ","",$_GET['clientName']);
    
    $session    = $opentok->createSession();
    
    $sessionID = $session->getSessionId();
    
    $token = $opentok->generateToken($sessionID);
    
    //ServicePanel::addClient($clientName, $sessionID);
    
    $client = $clientName.":".$sessionID;
    
    apcu_store("ClientList", $client);
    
    var_dump(apcu_fetch('clientList'));
    
?>

<!DOCTYPE html>

<head>

    <title>InfoRadx Service Panel</title>

    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src='http://static.opentok.com/webrtc/v2.2/js/opentok.min.js'></script>


    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.14.1/build/cssnormalize/cssnormalize-min.css">
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <meta property="og:title" content="title"/>
    <meta property="og:url" content="">
    <meta property="og:description" content=""/>
    <meta property="og:image" content="icon.png">
    <link rel="shortcut icon" href="icon.png"/>

</head>

<body>

    <div id='header'>
        <a href=''><h1><i class='fa fa-group'></i> InfoRadix Service Panel</h1></a>
    </div>

    <div class='content' id="session-room">
        
        <div id="client-panel">

            <h2>Session Started</h2>

            <div id="client-publisher-div-wrapper"><div id="publisher-div"><p><span id="pub-msg"><blink>Starting Camera...</blink></span></p></div></div>
            
            <div id="client-subscriber-div-wrapper"><div id="subscriber-div"><p><span id="sub-msg"><blink>Waiting for response...</blink></span></p></div></div>

        </div>
    </div>

</body>
<input type='hidden' id='apiKey'      value="<?php echo API_KEY;    ?>" />
<input type='hidden' id='apiSecret'   value="<?php echo API_SECRET; ?>" />
<input type='hidden' id='clientName'  value="<?php echo $clientName   ?>" />
<input type='hidden' id='sessionId'   value="<?php echo $sessionID; ?>" />
<input type='hidden' id='token'       value="<?php echo $token;     ?>" />

<script src="js/client.js"></script>
<script src="js/vendor/setImmediate.js"></script>

</html>
