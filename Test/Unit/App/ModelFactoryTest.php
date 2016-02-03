<?php
class App_ModelFactoryTest extends PHPUnit_Framework_TestCase
{

    const TEST_MODULE_NAME = 'Api';
    const TEST_FAKE_MODULE_NAME = 'Web';

    const TEST_MODEL_NAME = 'RequestModel';
    const TEST_FAKE_MODEL_NAME = 'RequestFooModel';

    public function testModelBuildSuccess(){
        $testModel = $this->getModelName(self::TEST_MODULE_NAME, self::TEST_MODEL_NAME);
        $this->assertInstanceOf('Api\Models\RequestModel', $testModel);

    }

    public function testModelBuildFails(){
        $testModel = $this->getModelName(self::TEST_MODULE_NAME, self::TEST_FAKE_MODEL_NAME);
        try {
            $test = new $testModel();
        } catch (Exception $ex) {
            $this->assertEquals($ex->getMessage(), "Invalid model requested.");
            return;
        }
        $this->fail("Expected Exception has not been raised.");

        $testModel = $this->getModelName(self::TEST_FAKE_MODULE_NAME, self::TEST_MODEL_NAME);
        try {
            $test = new $testModel();
        } catch (Exception $ex) {
            $this->assertEquals($ex->getMessage(), "Invalid model requested.");
            return;
        }
        $this->fail("Expected Exception has not been raised.");

    }

    protected function getModelName($module, $model){
        return 'App\\'. $module . '\\Models\\' . $model ."Model";
    }
}