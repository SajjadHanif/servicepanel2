<?php

    define(API_KEY,"45591762");
    
    define(API_SECRET,"ef909bf2fde9464daf9e9d293aeec7cff251ad7d");
    
    require "../vendor/predis/autoload.php";
    Predis\Autoloader::register();

    try {

        //$redis = new Predis\Client();

        $redis = new Predis\Client(array(
        'host' => parse_url($_ENV['REDISCLOUD_URL'], PHP_URL_HOST),
        'port' => parse_url($_ENV['REDISCLOUD_URL'], PHP_URL_PORT),
        'password' => parse_url($_ENV['REDISCLOUD_URL'], PHP_URL_PASS),
    ));

        echo "Successfully connected to Redis<br/>";
    }
    catch (Exception $e) {
        echo "Couldn't connected to Redis";
        echo $e->getMessage();
    }

    
?>    
