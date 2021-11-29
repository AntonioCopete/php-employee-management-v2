<?php

class LoginController extends Controller
{
    public function __construct() {
        parent::__construct();
        $this->view->render('login/index');
    }

    public function checkLogin() {
        echo "checking login";
    }
}