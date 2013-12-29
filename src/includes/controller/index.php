<?php defined('APP_PATH') OR die('Access denied');

/**
 * Strona główna
 *
 * @param array $app
 */
function index_action(array $app)
{
    $dogecoin = $app['dogecoin'];
    $db_link  = $app['db_link'];

    $status = $_GET['status'];
    $doge   = $_GET['doge'];

    $account_address = $dogecoin->getaccountaddress('dogecoins');

    $payout_average = get_avarage_payout($db_link);
    $payout_daily = get_daily_payout($db_link);
    $payout_total = get_total_payout($db_link);

    print_view('template/template', array(
        'content_view' => 'page/index',
        'content_vars' => array(
            'status'          => $status,
            'doge'            => $doge,
            'account_address' => $account_address,
            'payout_average'  => $payout_average,
            'payout_daily'    => $payout_daily,
            'payout_total'    => $payout_total,
        ),
    ));
}
