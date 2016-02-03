<?php
/**
 *
 * @package    AbstractResultModel.php
 * @author     Rakesh Shrestha
 * @since      3/2/16 11:58 PM
 * @version    1.0
 */
namespace App\Api\Models;

abstract class AbstractResultrModel
{
    protected $data;

    protected $parsedData;

    abstract public function parse();

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getParsedData()
    {
        return $this->parsedData;
    }

    /**
     * @param mixed $parsedData
     */
    public function setParsedData($parsedData)
    {
        $this->parsedData = $parsedData;
    }


}

