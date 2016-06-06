<?php

    class ServicePanel{
        
        private static $clientList = array();
        
        
        public static function addClient($clientName,$sessionID){
            
                //echo $clientName." ".$sessionID;
            
                self::$clientList[$clientName] = $sessionID;
                
                return true;

        }
        
        public static function removeClient($clientName){
            
                if(array_key_exists ( $clientName , $clientList)){

                    unset(self::$clientList[$clientName]);
                    
                    return true;

                }
                else{
                    
                    return false;
                }
        }
        
        public static function getClientList(){
            
            return self::$clientList;
        }
    }
