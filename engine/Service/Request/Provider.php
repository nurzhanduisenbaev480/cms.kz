<?php

namespace Engine\Service\Request;

use Engine\Core\Request\Request;
use Engine\Service\AbstractProvider;

class Provider extends AbstractProvider
{
    public $serviceName = 'request';

    /**
     * @return mixed
     */
    public function init()
    {
        // TODO: Implement init() method.
        $request = new Request();
        $this->di->set($this->serviceName, $request);
    }
}