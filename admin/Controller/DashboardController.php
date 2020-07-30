<?php

namespace Admin\Controller;


class DashboardController extends AdminController
{
    public function index(){
        $userModel = $this->load->model('User');
        print_r($userModel->repository->getUsers());
//        $userModel->repository->test();
        // 22 urok 8 min
        $this->view->render('dashboard');
    }

}