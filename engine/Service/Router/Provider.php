<?php

namespace Engine\Service\Router;

use Engine\Core\Router\Router;
use Engine\Service\AbstractProvider;

class Provider extends AbstractProvider
{
    public $serviceName = 'router';

    /**
     * @return mixed
     */
    public function init()
    {
        // TODO: Implement init() method.
        $router = new Router('http://cms.kz/');
        $this->di->set($this->serviceName, $router);
    }
}