<?php

class UserController extends Controller
{
    public $id;
    private $session;
    public function __construct()
    {
        parent::__construct();
        $this->view->render('user/index');
        $this->loadModel('user');
        $this->session = new Session();
        $this->session->init();
        if($this->session->getStatus() === 1 || empty($this->session->get('name')))
        exit('No permission');
    }

    public function getUsers()
    {
        $users = $this->model->get();
        var_dump($users);
        echo json_encode($users);
    }

}