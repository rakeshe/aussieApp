<?php
/**
 *
 * @package    ModelFactory.php
 * @author     Rakesh Shrestha
 * @since      3/2/16 11:18 PM
 * @version    1.0
 */
namespace App;
use Exception;
class ModelFactory
{

    public static function build($module, $model) {
        $modelBuilder = __NAMESPACE__ .'\\' . $module . '\\Models\\' . $model ."Model";
        if (class_exists($modelBuilder)) {
            $instance = new $modelBuilder();
            return $instance;
        }
        else {
            throw new Exception("Invalid model requested.");
        }
    }


}