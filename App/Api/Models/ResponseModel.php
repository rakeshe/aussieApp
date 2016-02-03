<?php
/**
 *
 * @package    ResponseModel.php
 * @author     Rakesh Shrestha
 * @since      4/2/16 12:03 AM
 * @version    1.0
 */
namespace App\Api\Models;

class ResponseModel
{
    protected $rawResponse;
    protected $parsedResponse;

    /**
     * @return mixed
     */
    public function getRawResponse()
    {
        return $this->rawResponse;
    }

    /**
     * @param $response
     * @return $this
     */
    public function setRawResponse($response)
    {
        $this->rawResponse = $response;
        return $this;
    }

    public function parse(){
        $this->parsedResponse = json_decode($this->rawResponse);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getParsedResponse()
    {
        return $this->parsedResponse;
    }





}