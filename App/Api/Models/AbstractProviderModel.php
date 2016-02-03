<?php
/**
 *
 * @package    AbstractModel.php
 * @author     Rakesh Shrestha
 * @since      3/2/16 11:47 PM
 * @version    1.0
 */
namespace App\Api\Models;
use App\Api\Models\RequestModel,
    App\Api\Models\ResponseModel,
    App\Helpers\CurlHelper
    ;

 abstract class AbstractProviderModel
 {

     protected $providerName;
     protected $providerConfigs;

     protected $params;
     /** @var  RequestModel */
     protected $request;

     /** @var  ResponseModel */
     protected $response;

     abstract protected function init();

     abstract public function getTopArtist();

     abstract public function getArtistInfo();

     public function __construct(){
         $this->init();
         $this
             ->setRequest()
             ->setResponse();
     }

     /**
      * @return mixed
      */
     public function getProviderConfigs()
     {
         return $this->providerConfigs;
     }

     /**
      * @param mixed $providerConfigs
      */
     public function setProviderConfigs($providerConfigs)
     {
         $this->providerConfigs = $providerConfigs;
     }

     /**
      * @return mixed
      */
     public function getProviderName()
     {
         return $this->providerName;
     }

     /**
      * @param mixed $providerName
      */
     public function setProviderName($providerName)
     {
         $this->providerName = $providerName;
     }

     /**
      * @return RequestModel
      */
     public function getRequest()
     {
         return $this->request;
     }

     /**
      * @return $this
      */
     public function setRequest()
     {
         $this->request = new RequestModel();
         return $this;
     }

     /**
      * @return ResponseModel
      */
     public function getResponse()
     {
         return $this->response;
     }

     /**
      * @return $this
      */
     public function setResponse()
     {
         $this->response = new ResponseModel();
         return $this;
     }


     public function call($function){
         $functionName = 'get' . ucfirst($function);
         if(method_exists($this, $functionName)){
            return $this->$functionName();
         }
     }

     /**
      * @return mixed
      */
     public function getParams()
     {
         return $this->params;
     }

     /**
      * @param mixed $params
      */
     public function setParams($params)
     {
         $this->params = $params;
     }


     public function get(){

         if(null !== $this->request){
             $this
                 ->response->setRawResponse(CurlHelper::get($this->request))
                 ->parse()
             ;
         }

     }


     public function post(){

     }
 }