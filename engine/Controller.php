<?php

namespace Engine;

use Engine\DI\DI;

abstract class Controller
{
    /**
     * @var Engine\DI\DI
     */
    protected $di;
    /**
     * @var $db
     */
    protected $db;
    /**
     * @var $view
     */
    protected $view;

    /**
     * Controller constructor.
     * @param DI $di
     */
    public function __construct(DI $di)
    {
        $this->di = $di;
        $this->db = $this->di->get('db');
        $this->view = $this->di->get('view');
    }

}