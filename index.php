<!DOCTYPE html>

<head>

    <title>InfoRadx ServicePanel</title>

    <meta http-equiv="content-type" content="text/html; charset=utf-8">

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
        <a href=''><h1><i class='fa fa-group'></i> InfoRadix ServicePanel</h1></a>
    </div>

    <div class='content' id='choose-room'>

        <p>Click link below to talk to Admin.</p>

        <div class='room-div'>    

            <div class="room-title-div">InfoRadix ServicePanel</div>
            
            <form id='roomForm' name='roomForm' method='get' action="client.php">

                <input type='text' class='username-input' id='clientName' name='clientName' autocomplete='off' maxlength='16' placeholder='Please enter your name'>

                <input  class='button-div' type='submit' value='Start'>

            </form>
            
        </div>

    </div>

</body>

</html>
