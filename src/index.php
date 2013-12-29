<?php

/**
 * Nie wyświetlamy błędów użytkownikom.
 */
error_reporting(0);

/**
 * Ścieżka do użycia przy ładowaniu kolejnych plików
 * oraz dodatkowo zabezpieczenie przed ich bezpośrednim wywołaniem.
 */
define('APP_PATH', __DIR__.DIRECTORY_SEPARATOR);

/**
 * Ładujemy aplikację
 */
$app = require_once APP_PATH.'includes/bootstrap.php';

/**
 * Ładujemy odpowiednią stronę
 */
if (empty($app['page'])) {
    index_action($app);
} elseif ('send' === $app['page']) {
    send_action($app);
} else {
    die('404: Not found');
}
