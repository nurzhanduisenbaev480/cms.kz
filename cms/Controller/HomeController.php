<?php

namespace Cms\Controller;

class HomeController extends CmsController
{
    public function index(){
        $data = ['name'=>'Nureke'];
        $this->view->render('index', $data);
    }
    public function product($id){
        echo 'Product page  '.$id;
    }
}