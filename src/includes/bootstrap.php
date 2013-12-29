<?php defined('APP_PATH') OR die('Access denied');

/**
 * Ładujemy niezbędne pliki
 */
require_once APP_PATH.'includes/jsonRPCClient.php';
require_once APP_PATH.'includes/functions.php';

/**
 * Ładujemy kontrolery
 */
require_once APP_PATH.'includes/controller/index.php';
require_once APP_PATH.'includes/controller/send.php';


/**
 * Ładujemy konfigurację
 */
$config = require_once APP_PATH.'includes/config.php';


/**
 * Inicjalizujemy przydatne rzeczy
 */
$page = get_request_page();

$dogecoin = new jsonRPCClient(
    sprintf(
        'http://%s:%s@%s:%s/',
        $config['rpc']['name'],
        $config['rpc']['pass'],
        $config['rpc']['host'],
        $config['rpc']['port']
    )
);

$db_link =
    mysqli_connect(
        $config['database']['host'],
        $config['database']['user'],
        $config['database']['pass'],
        $config['database']['name']
    ) OR die('Database error '.mysqli_error($db_link));


/**
 * Zwracamy rzeczy, które reprezentują naszą „aplikację”
 * i mogą być użyte przy serwowaniu strony.
 */
return array(
    'page'     => $page,
    'dogecoin' => $dogecoin,
    'db_link'  => $db_link,
);
