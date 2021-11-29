<?php

class LoginController extends Controller
{
    public function __construct() {
        parent::__construct();
        $this->view->render('login/index');
    }

    public function authUser() {
        // echo "checking login";

        $checkLogin = $this->model->checkLogin($_POST["name"], $_POST["password"]);

        if (isset($checkLogin)) {
            header("Location: " . URL . "dashboard");
            exit;
        } else {
            header("Location: " . URL . "login");
            exit;
        }
    }
}