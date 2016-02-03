<?php
/**
 *
 * @package    CurlHelper.php
 * @author     Rakesh Shrestha
 * @since      3/2/16 11:53 PM
 * @version    1.0
 */

namespace App\Helpers;

use App\Api\Models;

class CurlHelper
{
    public static function get(Models\RequestModel $requestModel)
    {

        if (function_exists('curl_init')) {
            $curl = curl_init();

            $curlOptUrl = $requestModel->getApiEndPoint() ;
            $curlOptUrl .= null !== $requestModel->getParams() ? "?" . $requestModel->getParams() : '';

            curl_setopt($curl, CURLOPT_URL, $curlOptUrl);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response =curl_exec($curl);
            curl_close($curl);
            return $response;
        }
    }

    public static function post(Models\RequestModel $requestModel)
    {

        if (function_exists('curl_init')) {
            $curl = curl_init($requestModel->getApiEndPoint());

            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $requestModel->getParams());
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response =curl_exec($curl);
            curl_close($curl);
            return $response;
        }
    }
}