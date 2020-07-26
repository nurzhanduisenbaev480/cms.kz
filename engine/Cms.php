<?php

namespace Engine;

use Engine\Core\Router\DispatchedRoute;
use Engine\Helper\Common;
class Cms
{
    /**
     * @var \Engine\DI\DI
     */
    private $di;
    /**
     * @var $router
     */
    private $router;

    /**
     * Cms constructor.
     * @param $di
     */
    public function __construct($di)
    {
        $this->di = $di;
        $this->router = $this->di->get('router');
    }

    /**
     * Run Cms
     */
    public function run(){
        try{
//            $this->router->add('home', '/', 'HomeController:index');
//            $this->router->add('product', '/product/(id:int)', 'HomeController:product');
            require_once __DIR__.'/../'.mb_strtolower(ENV).'/Route.php';
            $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());
            if ($routerDispatch == null){
                $routerDispatch = new DispatchedRoute('ErrorController:page404');
            }
            list($class, $action) = explode(':', $routerDispatch->getController(), 2);

            $controller = '\\'.ENV.'\\Controller\\'.$class;
            $parameters = $routerDispatch->getParameters();
            //print_r($parameters);
            call_user_func_array([new $controller($this->di), $action],$parameters);
        }catch (\Exception $exception){
            echo $exception->getMessage();
            exit();
        }

    }
}