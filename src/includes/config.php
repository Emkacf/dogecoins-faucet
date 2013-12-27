<?php

require_once 'jsonRPCClient.php';

$rpcname = '';
$rpcpassword = '';
$host = '127.0.0.1';
$port = '22555';

$url = sprintf('http://%s:%s@%s:%s/', $rpcname, $rpcpassword, $host, $port);

$dogecoin = new jsonRPCClient($url);

$link = mysqli_connect('localhost', 'USER', 'PASSWORD', 'DBNAME') or die('Error '.mysqli_error($link));
