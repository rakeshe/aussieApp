<?php
/**
 *
 * @package    Autoloader.php
 * @author     Rakesh Shrestha
 * @since      3/2/16 10:56 PM
 * @version    1.0
 */
namespace App;
class Autoloader {
    static public function loader($className) {
        $fileName = BASE_PATH . '/../' . str_replace('\\', '/', $className) . '.php';
        if (file_exists($fileName)) {
            require_once($fileName);
            return class_exists($className) ? true : false;
        }
    }
}
spl_autoload_register(__NAMESPACE__ . '\Autoloader::loader');
