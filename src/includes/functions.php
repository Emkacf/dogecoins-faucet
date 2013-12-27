<?php

/**
 * Zwraca uśrednioną wartość wypłaty
 * na podstawie historii poprzednich wypłat.
 *
 * @param  resource $db_link
 * @return float
 */
function get_avarage_payout($db_link)
{
    $db_query = 'SELECT * FROM logs';
    $db_result = mysqli_query($db_link, $db_query);

    $payout_average = 0;

    while ($row = mysqli_fetch_array($db_result)) {
        $payout_average = $payout_average + $row['payout'];
    }

    $am = mysqli_num_rows($db_result);

    return $payout_average / $am;
}

/**
 * @param  resource $db_link
 * @return mixed
 */
function get_daily_payout($db_link)
{
    $db_query = 'SELECT * FROM logs WHERE DATE(date) = DATE(NOW())';
    $db_result = mysqli_query($db_link, $db_query);

    $payout_daily = 0;

    while ($row = mysqli_fetch_array($db_result)) {
        $payout_daily = $payout_daily + $row['payout'];
    }

    return $payout_daily;
}

/**
 * Zwraca sumę wszystkich wypłat.
 *
 * @param  resource $db_link
 * @return mixed
 */
function get_total_payout($db_link)
{
    $db_query = 'SELECT * FROM logs';
    $db_result = mysqli_query($db_link, $db_query);

    $payout_total = 0;

    while ($row = mysqli_fetch_array($db_result)) {
        $payout_total = $payout_total + $row['payout'];
    }

    return $payout_total;
}
