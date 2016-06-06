<?php

require_once 'vendor\redisent\src\redisent\Redis.php';
$redis = new redisent\Redis('redis://localhost');
$redis->set('awesome', 'absolutely');
echo "Is Redisent awesome? ", $redis->get('awesome'), "\n";

?>

