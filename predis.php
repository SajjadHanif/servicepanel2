<?php

require "vendor/predis/autoload.php";
Predis\Autoloader::register();
//require "vendor/predis/lib/predis.php";

// since we connect to default setting localhost
// and 6379 port there is no need for extra
// configuration. If not then you can specify the
// scheme, host and port to connect as an array
// to the constructor.

try {
    
    //$redis = new Predis\Client();
    //$redis = new Predis\Client('tcp://127.0.0.1:6379'."?read_write_timeout=0");
    /*$redis = new Predis\Client(array(
        "scheme" => "tcp",
        "host" => "127.0.0.1",
        "port" => 6379));*/
    
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

/*$list = "PHP Frameworks List";
$redis->rpush($list, "Symfony 2");
$redis->rpush($list, "Symfony 1.4");
$redis->lpush($list, "Zend Framework");

//echo "Number of frameworks in list: " . $redis->llen($list) . "<br>";

$arList = $redis->lrange($list, 0, -1);
echo "<pre>";
print_r($arList);
echo "</pre>";

// the last entry in the list
echo $redis->rpop($list) . "<br>";

// the first entry in the list
echo $redis->lpop($list) . "<br>";*/

/*$redis->hset("ClientList","Client1","123");

$redis->hset("ClientList","Client2","357");

$redis->hset("ClientList","Client3","656");

$redis->hset("ClientList","Client4","868");

$redis->hset("ClientList","Client5","878");*/

$redis->hdel(ClientList,Client2);

$redis->hdel(ClientList,Client3);

$redis->hdel(ClientList,Client4);

$redis->hdel(ClientList,Client5);

$clientList = $redis->hgetall(ClientList);

print_r($clientList);