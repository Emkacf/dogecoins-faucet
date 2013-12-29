<?php

error_reporting(0);

/**
 * Ścieżka do użycia przy ładowaniu podplików
 * oraz dodatkowo zabezpieczenie przed ich bezpośrednim wywołaniem.
 */
define('APP_PATH', __DIR__.DIRECTORY_SEPARATOR);

require_once APP_PATH.'includes/config.php';
require_once APP_PATH.'includes/functions.php';


$status = $_GET['status'];
$doge = $_GET['doge'];


$account_address = $dogecoin->getaccountaddress('dogecoins');

$payout_average = get_avarage_payout($link);
$payout_daily = get_daily_payout($link);
$payout_total = get_total_payout($link);


print_view('template', array(
    'content_view' => 'index',
    'content_vars' => array(
        'status'         => $status,
        'doge'           => $doge,
        'payout_average' => $payout_average,
        'payout_daily'   => $payout_daily,
        'payout_total'   => $payout_total,
    ),
));
