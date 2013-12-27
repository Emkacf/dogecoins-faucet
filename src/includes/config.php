<?php
	require_once 'jsonRPCClient.php';
	$rpcname = 'dogecoins';
	$rpcpassword = 'laksjdhfg1706';
	$host = '127.0.0.1';
	$port = '22555';
	
	$dogecoin = new jsonRPCClient("http://$rpcname:$rpcpassword@$host:$port/");
	$link = mysqli_connect("localhost","root","DHXTKqXb1706","faucet") or die("Error " . mysqli_error($link));

?>