<?php

namespace Admin\Controller;


class DashboardController extends AdminController
{
    public function index(){
        // Load models
        $userModel = $this->load->model('User');

        // Load global language
        $this->load->language('dashboard/menu');
        //print_r($lang);
        // Render this template
        $this->view->render('dashboard',$lang);
    }

}