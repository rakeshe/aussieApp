<?php
/**
 *
 * @package    BaseController.php
 * @author     Rakesh Shrestha
 * @since      3/2/16 11:04 PM
 * @version    1.0
 */
namespace App;


class BaseController
{
    const APP_SCOPE = 'global';
    protected $globalConfig;

    /** @var  Router */
    protected $router;


    public function init(){
        $this->router = new Router();
        $this->globalConfig = Helpers\ConfigHelper::loadConfigs(self::APP_SCOPE);
    }


}
