<?php defined('APP_PATH') OR die('Access denied');

/**
 * Zwraca nazwę żądanej strony na podstawie aktualnego adresu URL.
 *
 * @return string
 */
function get_request_page()
{
    // o stronie decydujemy na podstawie adresu
    $page = $_SERVER['REQUEST_URI'];

    // pozbywamy się zbędnej nazwy pliku
    $page = str_replace('index.php', '', $page);

    // pozbywamy się części z parametrami GET
    if ($pos = strpos($page, '?')) {
        $page = substr($page, 0, $pos);
    }

    // wywalamy zbędne slashe
    $page = trim($page, '/');

    return $page;
}

/**
 * Ładuje i wyświetla wybrany widok.
 *
 * @param string $name Nazwa widoku
 * @param array  $vars Tablica asocjacyjna zmiennych do użycia w widoku
 */
function print_view($name, array $vars = array())
{
    // zakładamy, że wszystkie widoki są w odpowiednim katalogu
    $view_path = APP_PATH.'includes/view/'.$name.'.php';

    // upewniamy się, że plik z widokiem istnieje
    if (!is_file($view_path)) {
        die('Internal Server Error');
    }

    // rozpakowujemy tablicę asocjacyjną do zmiennych dla widoku
    extract($vars);

    // ładujemy widok
    require_once $view_path;
}

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
