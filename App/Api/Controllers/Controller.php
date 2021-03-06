<?php
/**
 *
 * @package    baseController.php
 * @author     Rakesh Shrestha
 * @since      3/2/16 11:35 PM
 * @version    1.0
 */
namespace App\Api\Controllers;

use App\BaseController;
use App\Helpers\ConfigHelper;
use App\ModelFactory;

class Controller extends BaseController
{
    const MODULE_NAME = 'Api';

    protected $providerName;


    /** @var  \App\Api\Models\AbstractProviderModel */
    protected $providerModel;


    public function __construct()
    {
        parent::init();
        $this->setProviderName();

        $this->providerModel = ModelFactory::build(self::MODULE_NAME, 'Lastfm');

        $providerConfig = ConfigHelper::loadConfigs($this->providerName);
        $this->providerModel->setProviderConfigs($providerConfig);

        $this->providerModel->setParams($this->router->getParams());

        $jsonResponse = $this->providerModel->call($this->router->getActionName());

        $this->sendResponse($jsonResponse);

    }


    protected function setProviderName()
    {
        if (!empty($this->globalConfig['defaultProvider'])) {
            $this->providerName = $this->globalConfig['defaultProvider'];
        }

    }

    protected function sendResponse($responseBody)
    {
        if (empty($responseBody)) {
            $responseContainer = [
                'success' => false,
                'errors'  => 'Hmmm this is not what you are looking for'
            ];

            $responseBody = json_encode($responseContainer);
        }
        header('Content-type: application/json');
        echo $responseBody;
    }


}