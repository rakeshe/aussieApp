<?php
/**
 *
 * @package    RequestModel.php
 * @author     Rakesh Shrestha
 * @since      4/2/16 12:03 AM
 * @version    1.0
 */
 namespace App\Api\Models;

 class RequestModel
 {
     protected $apiEndPoint;
     protected $method;
     protected $params;

     /**
      * @return mixed
      */
     public function getApiEndPoint()
     {
         return $this->apiEndPoint;
     }

     /**
      * @param mixed $apiEndPoint
      */
     public function setApiEndPoint($apiEndPoint)
     {
         $this->apiEndPoint = $apiEndPoint;
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

     /**
      * @return mixed
      */
     public function getMethod()
     {
         return $this->method;
     }

     /**
      * @param mixed $method
      */
     public function setMethod($method)
     {
         $this->method = $method;
     }




 }