<?php
    
    apcu_store("clientList", "ClientList");
    
    var_dump(apcu_fetch('clientList'));
    
?>
        
