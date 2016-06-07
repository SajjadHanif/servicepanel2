var apiKey     = "45591762";
var sessionId  = "";
var token      = "";
var clientName = "";
var session    = "";
var publisher  = "";

function loadClientList(){
 
        $.ajax({
        type: "GET",
        data: "clientList",
        url: "../clientlist.php",
        success: function(objResponse){
                if(objResponse) {
                    //alert("list: "+objResponse);
                    var userList = JSON.parse(objResponse);
                    var cList = $('ul');
                    $.each(userList, function(key,value)
                    {
                        var li = $('<li/>')
                            .attr('role', 'menuitem')
                            .appendTo(cList);
                        var aaa = $('<a/>')
                            .text(key)
                            .attr('id', key)
                            .click(function(){ 
                            loadClientData(key, value); 
                            $(this).css('background','#4B545F');
                            })
                            .appendTo(li);
                    });
                    if(clientName!="")
                    {
                       $('#'+clientName).css('background','#4B545F'); 
                    }
                    /*$.each( userList, function( key, value ) {
                      alert( key + ": " + value );
                    });
                     for (var index in userList) {
                        alert(index+","+userList[index]);
                    }  */
                   // alert(userList);
                }
                else{
                    alert("Can't load user list.");
                    return;
                }
            }
        });

}

function loadClientData(client_Name, session_Id){
    
        clientName  = client_Name;
        sessionId   = session_Id;
        $('#msg-bar').text(clientName+' Selected.');
        //alert(clientName+"has been selected");
        return;

}
function loadClient(){

        if(clientName =="" || sessionId == "")
        {
            alert("Plaese Select a Client form the list first");
            //$('#msg-bar').text('Plaese Select a Client form the list first. ');
            return false;
        }
        blink();
        $.ajax({
        type: "GET",
        data: "clientName:"+clientName+"&sessionID:"+sessionId,
        url: "../session.php",
        success: function(objResponse){
                if(objResponse) {
                   token = objResponse;
                   //alert(token);
                   //setImmediate(startSession());
                   startSession();
                }
                else{
                    alert("Can't start session");
                    return;
                }
            }
        });

    }

function startSession(){
    session = OT.initSession(apiKey,sessionId);
    
    $('<div/>').attr('id', 'publisher-div').appendTo('#admin-publisher-div-wrapper');
    $('<div/>').attr('id', 'subscriber-div').appendTo('#admin-subscriber-div-wrapper');
    
    session.on("streamCreated", function(event) {
        session.subscribe(event.stream,'subscriber-div',{
            //insertMode: 'append'
            width:  '300px',
            height: '250px'
        
        });
        //alert("Subscribed to "+event.stream.name);

    });
    session.on("streamDestroyed", function(event) {
        
        alert("The client has left the session.");
        
        removeClient();
        
    });
    session.connect(token,function(error) {
        
        publisher = OT.initPublisher('publisher-div',{ 
            name: "Admin", 
            //insertMode: 'append',  
            width:  '300px',
            height: '250px'
            
         });
     
    session.publish(publisher);
    
    if (error) {
        
        alert("Error connecting: ", error.code, error.message);
        
    } else {
        
    $('#msg-bar').text('Connected with '+clientName);
    
    }

    });
    
    session.on("sessionDisconnected", function(event){

        $('#msg-bar').text('Session with client ended.');
        
        $('blink').text('');
        
        //alert("You have been disconnected from this session.");

        //document.location.reload(true);

    });
}

function removeClient()
{
        $.ajax({
        type: "GET",
        data: "clientName:"+clientName,
        url: "../RemoveClient.php",
        success: function(objResponse){
                alert(objResponse);
                clientName   = "";
                sessionId    = "";
                return true;
        }

    });
}

// Code to stop publishing to a session
 function disconnect() {

     if(clientName == "" || sessionId == "")
        {
            alert("You are not connetcted to any session.");
            return false;
        }

     removeClient();

     session.disconnect();
  
}


function blink(){
    setInterval(function(){
          $('blink').each(function(){
            $(this).css('visibility' , $(this).css('visibility') === 'hidden' ? '' : 'hidden')
          });
        }, 250);
}

  $(document).ready(function(e){
    
      $('blink').css('visibility','hidden'); 
        loadClientList();
        //blink();

      $("#start-button").click(function(){
        loadClient();
      });

      $("#end-button").click(function(){
        disconnect();
      });
      setInterval(function(){ 
            $("#user-list li").remove();
            loadClientList(); }
            , 10000);

  });  