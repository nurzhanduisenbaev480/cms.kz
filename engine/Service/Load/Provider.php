<?php

namespace Engine\Service\Load;

use Engine\Load;
use Engine\Service\AbstractProvider;

class Provider extends AbstractProvider
{
    public $serviceName = 'load';

    /**
     * @return mixed
     */
    public function init()
    {
        // TODO: Implement init() method.
        $load = new Load();
        $this->di->set($this->serviceName, $load);
    }
}