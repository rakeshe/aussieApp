<?php
/**
 *
 * @package    CurlHelper.php
 * @author     Rakesh Shrestha
 * @since      3/2/16 11:53 PM
 * @version    1.0
 */

namespace App\Helpers;

class ConfigHelper
{
    const CONFIG_PATH = 'App/Configs/';
    const CONFIG_FILE_TYPE = 'ini';

    public static function loadConfigs($scope)
    {
        $configFile = BASE_PATH . '/../' . self::CONFIG_PATH . $scope . '.' . self::CONFIG_FILE_TYPE;
        if (file_exists($configFile)) {
            $config = parse_ini_file($configFile, true);
            return $config;
        }
    }
}