<?php

namespace Engine\Core\Router;

class DispatchedRoute
{
    /**
     * @var $controller
     */
    private $controller;
    /**
     * @var $parameters
     */
    private $parameters;

    /**
     * DispatchedRoute constructor.
     * @param $controller
     * @param $parameters
     */
    public function __construct($controller, $parameters = [])
    {
        $this->controller = $controller;
        $this->parameters = $parameters;
    }

    /**
     * @return mixed
     */
    public function getController(){
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getParameters(){
        return $this->parameters;
    }
}