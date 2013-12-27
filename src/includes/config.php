<?php
	require_once 'jsonRPCClient.php';
	$rpcname = '';
	$rpcpassword = '';
	$host = '127.0.0.1';
	$port = '22555';
	
	$dogecoin = new jsonRPCClient("http://$rpcname:$rpcpassword@$host:$port/");
	$link = mysqli_connect("localhost","USER","PASSWORD","DBNAME") or die("Error " . mysqli_error($link));

?>