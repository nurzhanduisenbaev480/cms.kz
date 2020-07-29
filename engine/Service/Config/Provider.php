<?php

namespace Engine\Service\Config;

use Engine\Core\Config\Config;
use Engine\Service\AbstractProvider;

class Provider extends AbstractProvider
{
    public $serviceName = 'config';

    /**
     * @return mixed|void
     * @throws \Exception
     */
    public function init()
    {
        // TODO: Implement init() method.
        $config['main'] = Config::file('main');
        $config['database'] = Config::file('database');
        $this->di->set($this->serviceName, $config);
    }
}