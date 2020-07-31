<?php


namespace Admin\Controller;


class PostController extends AdminController
{
    public function listing(){
        $this->load->model('Post');

        $this->data['posts'] = $this->model->post->getPages();
//        print_r($this->data['posts']);
//        exit();
        $this->view->render('posts/list', $this->data);
    }

    public function create(){
        $this->load->model('Post');

        $this->view->render('posts/create');
    }
    public function edit($id){
        $this->load->model('Post');

        $this->data['post'] = $this->model->post->getPageData($id);
//        print_r($this->data);
        $this->view->render('posts/edit', $this->data);
    }

    public function add(){
        $this->load->model('Post');
        $params    = $this->request->post;
//        print_r($params);
        if (isset($params['title'])){
            $pageId = $this->model->post->createPost($params);
            echo $pageId;
            // 25 urok
        }
        //print_r($params);
    }
    public function update(){
        $this->load->model('Post');
        $params    = $this->request->post;
//        print_r($params);
//        exit();
        if (isset($params['title'])){
            $pageId = $this->model->post->updatePost($params);
            echo $pageId;
        }
    }
}