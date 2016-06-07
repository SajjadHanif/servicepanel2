var apiKey    = "";
var sessionId = "";
var token     = "";
var clientName = "";
var publisher;

$(document).ready(function(e){

        setInterval(function(){
            $('blink').each(function(){
            $(this).css('visibility' , $(this).css('visibility') === 'hidden' ? '' : 'hidden')
          });
        }, 250);

        apiKey      = $('#apiKey').val();
        sessionId   = $('#sessionId').val();
        token       = $('#token').val();
        clientName  = $('#clientName').val();

        setImmediate(startSession()); 

    });

function startSession(){
    
    var session = OT.initSession(apiKey,sessionId);
    
    $('<div/>').attr('id', 'publisher-div').appendTo('#client-publisher-div-wrapper');
    $('<div/>').attr('id', 'subscriber-div').appendTo('#client-subscriber-div-wrapper');


    session.on("streamCreated", function(event) {
        session.subscribe(event.stream,
            'subscriber-div',
            {//insertMode: 'append',
             width:  '300px',
             height: '250px'
                
        });
            
        //console.log("SessionID: "+ sessionId);
        
    });
    session.on("streamDestroyed", function(event) {
        
        alert("Session with admin ended.");
        
        $('#sub-msg').text("Session with admin ended");
    });

    session.connect(token,function(error) {
        
        publisher = OT.initPublisher('publisher-div',{ 
            name: clientName, 
            //insertMode: 'append',
            width:  '300px',
            height: '250px'
         });
     
    session.publish(publisher);
    
    });

    session.on("sessionDisconnected", function(event){

        alert("Session Disconnected.");
        
        $('#sub-msg').text("Session Disconnected");

    });

}
