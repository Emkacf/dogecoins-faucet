<?php defined('APP_PATH') OR die('Access denied');

$rpcname = '';
$rpcpassword = '';
$host = '127.0.0.1';
$port = '22555';

$url = sprintf('http://%s:%s@%s:%s/', $rpcname, $rpcpassword, $host, $port);

$dogecoin = new jsonRPCClient($url);

$link = mysqli_connect('localhost', 'USER', 'PASSWORD', 'DBNAME') OR die('Error '.mysqli_error($link));
