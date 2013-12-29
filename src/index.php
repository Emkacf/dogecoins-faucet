<?php

/**
 * Nie wyświetlamy błędów użytkownikom.
 */
error_reporting(0);

/**
 * Ścieżka do użycia przy ładowaniu podplików
 * oraz dodatkowo zabezpieczenie przed ich bezpośrednim wywołaniem.
 */
define('APP_PATH', __DIR__.DIRECTORY_SEPARATOR);

require_once APP_PATH.'includes/bootstrap.php';

if (empty($page)) {
    /**
     * Domyślnie wyświetlamy stronę główną
     */

    $status = $_GET['status'];
    $doge = $_GET['doge'];

    $account_address = $dogecoin->getaccountaddress('dogecoins');

    $payout_average = get_avarage_payout($link);
    $payout_daily = get_daily_payout($link);
    $payout_total = get_total_payout($link);

    print_view('template/template', array(
        'content_view' => 'page/index',
        'content_vars' => array(
            'status'         => $status,
            'doge'           => $doge,
            'payout_average' => $payout_average,
            'payout_daily'   => $payout_daily,
            'payout_total'   => $payout_total,
        ),
    ));
} elseif ('send' === $page) {
    /**
     * Strona wysyłania dogecoinów
     */

    /* Just things which are going to database like ip etc. */
    $today = date('y-m-d');
    $ip = $_SERVER['REMOTE_ADDR'];
    $address = $_POST['address'];
    $amount = $dogecoin->getbalance();
    $value = rand(1, 10);

    if ($amount < 10) {
        $status = 2;
    } else {
        /*Uncomment if you want your payout be dependent on amount you have in wallet*/
        /*
        if ($amount > 10) {
            if ($amount > 100000) {
                $value = rand(1, 1000);
            } elseif ($amount > 10000) {
                $value = rand(1, 100);
            } elseif ($amount > 1000) {
                $value = rand(1, 10);
            } else {
                $value = rand(1, 5);
            }
        }
        */


        $check = sprintf("SELECT * FROM logs WHERE DATE(date) = DATE(NOW()) AND ((ip = '%s') OR (wallet = '%s')) ", $ip, $address);

        $result2 = mysqli_query($link, $check);

        echo mysqli_num_rows($result2);

        if (mysqli_num_rows($result2) > 0) {
            $status = 3;
            $value = 0;
        } else {
            $transaction = $dogecoin->sendtoaddress($address, (float) $value);
            $query = sprintf("INSERT INTO logs VALUES (null, '%s', %s, '%s', '%s')", $today, $value, $address, $ip);
            $result = mysqli_query($link, $query);
            $status = 1;
        }
    }

    header('Location: index.php?status='.$status.'&doge='.$value);
} else {
    die('404: Not found');
}
