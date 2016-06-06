<?php

    require("servicepanel.php");

    //$clientList = ServicePanel::getClientList();

    //$jsonClientList = json_encode($clientList);

   var_dump(apcu_fetch('clientList'));
   
   //print_r(apcu_cache_info());

?>
