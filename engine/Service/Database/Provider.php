<?php

namespace Engine\Service\Database;

use Engine\Core\Database\Connection;
use Engine\Service\AbstractProvider;

class Provider extends AbstractProvider
{
    public $serviceName = 'db';

    /**
     * @return mixed
     */
    public function init()
    {
        // TODO: Implement init() method.
        $db = new Connection();
        $this->di->set($this->serviceName, $db);
    }
}