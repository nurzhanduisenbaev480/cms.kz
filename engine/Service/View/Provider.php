<?php

namespace Engine\Service\View;

use Engine\Core\Template\View;
use Engine\Service\AbstractProvider;

class Provider extends AbstractProvider
{
    /**
     * @var string
     */
    public $serviceName = 'view';
    /**
     * @return mixed
     */
    function init()
    {
        // TODO: Implement init() method.
        $view = new View($this->di);
        $this->di->set($this->serviceName, $view);
    }
}