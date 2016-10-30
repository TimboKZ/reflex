<?php
/**
 * Reflex PHP core.
 *
 * If post data is present, prints the posted data after the delay specified in
 *
 * @copyright  Copyright (c) 2016 Timur Kuzhagaliyev (https://foxypanda.me/)
 * @license    MIT License
 * @version    0.0.1
 * @link       https://github.com/TimboKZ/reflex
 */

/**
 * Default values for all three GET parameters accepted by Reflex
 * @since 0.0.1
 */
define('DEFAULT_DELAY_SECONDS', 0);
define('DEFAULT_CONTENT_TYPE', 'text/plain');
define('DEFAULT_DATA_SOURCE', null);

/**
 * Maximum delay after which server will return the data, in seconds.
 * @since 0.0.1
 */
define('MAX_DELAY_SECONDS', 15);

/**
 * Enable cross-origin resource sharing
 * @since 0.0.1
 */
header("Access-Control-Allow-Origin: *");

/**
 * For post requests execute Reflex's main logic, print a static page for everything else.
 * Note: If `data_source` parameter is empty, raw post data will be used.
 *
 * @since 0.0.1
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $delaySeconds = isset($_GET['delay_seconds']) ? $_GET['delay_seconds'] : DEFAULT_DELAY_SECONDS;
    $contentType = isset($_GET['content_type']) ? $_GET['content_type'] : DEFAULT_CONTENT_TYPE;
    $dataSource = isset($_GET['data_source']) ? $_GET['data_source'] : DEFAULT_DATA_SOURCE;

    if (!is_numeric($delaySeconds)) {
        die('Invalid value for `delay_seconds` parameter!');
    }
    $delaySeconds = floatval($delaySeconds);
    if ($delaySeconds > MAX_DELAY_SECONDS) {
        die('The value for `delay_seconds` is too big! Maximum allowed delay is ' . MAX_DELAY_SECONDS . ' second(s).');
    }

    header('Content-Type: ' . $contentType);

    $response = '';
    if(isset($dataSource)) {
        $response = $_POST[$dataSource];
    } else {
        $response = file_get_contents('php://input');
    }

    sleep($delaySeconds);

    echo $response;
    die();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reflex PHP</title>
</head>
<body>
<h1>Reflex PHP</h1>
<p>Refer to <a href="https://github.com/TimboKZ/reflex" target="_blank">https://github.com/TimboKZ/reflex</a> for more
    info.</p>
</body>
</html>
