<?php
use Engine\Cms;
use Engine\DI\DI;

try{
    // Dependency Injection
    $di = new DI();

    $cms = new Cms($di);
    $cms->run();

}catch(\ErrorException $exception){
    echo $exception->getMessage();
}