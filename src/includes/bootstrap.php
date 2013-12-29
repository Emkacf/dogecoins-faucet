<?php defined('APP_PATH') OR die('Access denied');

require_once APP_PATH.'includes/jsonRPCClient.php';
require_once APP_PATH.'includes/functions.php';

require_once APP_PATH.'includes/config.php';

$page = get_request_page();

/**
 * Zwracamy rzeczy, które reprezentują naszą „aplikację”
 * i mogą być użyte przy serwowaniu strony.
 */
return array(
    'page'     => $page,
    'dogecoin' => $dogecoin,
    'link'     => $link,
);
