<?php
$redis = new Redis();
$ret = $redis->connect('127.0.0.1', 6379);
print_r($ret);
?>