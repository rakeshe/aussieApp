<?php
class App_BaseControllerTest extends PHPUnit_Framework_TestCase
{

    public function testCreateRouterSuccessfully(){
        $router = new App_RouterTest();
        $this->assertInstanceOf('App\Router', $router);
    }

}
