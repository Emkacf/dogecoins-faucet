<?php

/**
 * Zwraca uśrednioną wartość wypłaty
 * na podstawie historii poprzednich wypłat.
 *
 * @param  resource $link
 * @return float
 */
function get_avarage_payout($link)
{
    $check = 'SELECT * FROM logs' or die('Error in the consult…'.mysqli_error($link));
    $result = mysqli_query($link, $check);
    $payout_average = 0;

    while ($row = mysqli_fetch_array($result)) {
        $payout_average = $payout_average + $row['payout'];
    }

    $am = mysqli_num_rows($result);

    return $payout_average / $am;
}

/**
 * @param  resource $link
 * @return mixed
 */
function get_daily_payout($link)
{
    $check = 'SELECT * FROM logs WHERE DATE(date) = DATE(NOW())' or die('Error in the consult…'.mysqli_error($link));
    $result2 = mysqli_query($link, $check);
    $payout_daily = 0;

    while ($row = mysqli_fetch_array($result2)) {
        $payout_daily = $payout_daily + $row['payout'];
    }

    return $payout_daily;
}

/**
 * Zwraca sumę wszystkich wypłat.
 *
 * @param  resource $link
 * @return mixed
 */
function get_total_payout($link)
{
    $check = 'SELECT * FROM logs' or die('Error in the consult…'.mysqli_error($link));
    $result2 = mysqli_query($link, $check);
    $payout_total = 0;

    while ($row = mysqli_fetch_array($result2)) {
        $payout_total = $payout_total + $row['payout'];
    }

    return $payout_total;
}
