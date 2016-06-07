<!DOCTYPE html>

<head>

    <title>InfoRadx Service Panel</title>

    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src='http://static.opentok.com/webrtc/v2.2/js/opentok.min.js'></script>


    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.14.1/build/cssnormalize/cssnormalize-min.css">
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="../css/style.css">

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
        
        <div id="admin-panel">
            
            <h2>Admin Panel</h2>
            <div id="admin-inner">
                
                <div id="msg-bar" class="msg-bar"><span>Select a client form the list to start session.</span></div>
                <div id="side-panel">

                    <div id="user-list">
                        <!--<a><b><i>Requests:</i></b></a>--> 
                        <ul></ul>
                    </div>

                    <div id="button-div" >
                        <button id="start-button" class="info-btn" value="Start Session">Start Session</button>
                        <button id="end-button" class="info-btn" value="End Session">End Session</button>
                    </div>

                </div>
                <div id="admin-publisher-div-wrapper"><div id="publisher-div"><p><blink>Starting Camera...</blink></p></div></div>
                <div id="admin-subscriber-div-wrapper"><div id="subscriber-div"><p><blink>Loading Client...</blink></p></div></div>
                
                </div>
                
        </div>
        
    </div>

</body>

<script src="../js/admin.js"></script>
<script src="js/vendor/setImmediate.js"></script>

</html>
