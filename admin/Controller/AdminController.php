<?php

namespace Admin\Controller;

use Engine\Controller;
use Engine\DI\DI;
use Engine\Core\Auth\Auth;

class AdminController extends Controller
{
    /**
     * @var Auth
     */
    protected $auth;
    /**
     * @var array
     */
    public $data = [];
    /**
     * AdminController constructor.
     * @param DI $di
     */
    public function __construct(DI $di)
    {
        parent::__construct($di);
        $this->auth = new Auth();

        if ($this->auth->hashUser() == null){
            header('Location: /admin/login/');
            exit();
        }
        // Load global language
        $this->load->language('dashboard/menu');
    }
    public function checkAuthorization(){}
    /**
     *
     */
    public function logout(){
        $this->auth->unAuthorize();
        header('Location: /admin/login/');
        exit();
    }

}