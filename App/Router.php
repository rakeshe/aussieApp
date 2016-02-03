<?php
/**
 *
 * @package    Router.php
 * @author     Rakesh Shrestha
 * @since      3/2/16 10:57 PM
 * @version    1.0
 */

namespace App;

class Router
{
    protected $url;
    protected $moduleName;
    protected $actionName;
    protected $params;

    public function __construct()
    {
        $this
            ->setUrl()
            ->parseUrl();
    }

    /**
     * @return mixed
     */
    public function getModuleName()
    {
        return $this->moduleName;
    }

    /**
     * @param mixed $moduleName
     */
    public function setModuleName($moduleName)
    {
        $this->moduleName = $moduleName;
    }


    /**
     * @return mixed
     */
    public function getActionName()
    {
        return $this->actionName;
    }

    /**
     * @param null $actionName
     * @return $this
     */
    protected function setActionName($actionName = null)
    {
        $this->actionName = $actionName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param null $params
     * @return $this
     */
    protected function setParams($params = null)
    {
        $this->params = $params;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param null $url
     * @return $this
     */
    protected function setUrl($url = null)
    {
        $url       = null === $url && !empty($_GET['_url']) ? $_GET['_url'] : $url;
        $this->url = $url;
        return $this;
    }

    /**
     *
     */
    protected function parseUrl()
    {
        if (null !== $this->getUrl()) {
            $urlParts = explode("/", $this->getUrl());
            if (!empty($urlParts) && count($urlParts) > 1) {

                // Set Module
                $urlParts   = array_slice($urlParts, 1);
                if(!empty($urlParts)){
                    $this->setModuleName(reset($urlParts));
                }

                // Set Action
                $urlParts   = array_slice($urlParts, 1);
                if(!empty($urlParts)){
                    $this->setActionName(reset($urlParts));
                }

                // Set Params
                $urlParts   = array_slice($urlParts, 1);
                if(!empty($urlParts)){
                    $this->setParams($urlParts);
                }

            }
        }

    }


}
