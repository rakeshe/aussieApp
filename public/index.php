<?php
try {
    define('BASE_PATH', realpath(dirname(__FILE__)));
    require_once(BASE_PATH .  '/../App/Autoloader.php');

    $application = new \App\Api\Controllers\Controller();


} catch (Exception $e) {
    echo $e->getMessage();
}
