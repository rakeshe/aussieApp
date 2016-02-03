<?php

class App_RouterTest extends PHPUnit_Framework_TestCase
{
    const TEST_URL_PATH = 'Api/MyAction/Red/10';
    const TEST_MODULE_NAME = 'Api';
    const TEST_ACTION_NAME = 'MyAction';
    const TEST_PARAM_ONE = 'Red';
    const TEST_PARAM_TWO = '10';


    public function  testParseUrlModuleName()
    {

        $urlParts   = explode("/", self::TEST_URL_PATH);
        $urlParts   = array_slice($urlParts, 1);
        $moduleName = reset($urlParts);
        $this->assertEquals($moduleName, self::TEST_MODULE_NAME);
    }

    public function  testParseUrlActionName()
    {

        $urlParts   = explode("/", self::TEST_URL_PATH);
        $urlParts   = array_slice($urlParts, 2);
        $actionName = reset($urlParts);
        $this->assertEquals($actionName, self::TEST_ACTION_NAME);
    }

    public function  testParseUrlParams()
    {

        $urlParts = explode("/", self::TEST_URL_PATH);
        $urlParts = array_slice($urlParts, 3);
        $this->assertEquals($urlParts[0], self::TEST_PARAM_ONE);
        $this->assertEquals($urlParts[1], self::TEST_PARAM_TWO);
    }

}
