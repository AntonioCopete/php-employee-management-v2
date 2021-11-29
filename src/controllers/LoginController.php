<?php

class LoginController extends Controller
{
    public function __construct() {
        parent::__construct();
        $this->view->render('login/index');
        $this->loadModel('login');
    }

    public function authUser() {

        $checkLogin = $this->model->checkLogin($_POST["name"], $_POST["password"]);

        if (isset($checkLogin)) {
            session_start();
            $_SESSION["name"] = $_POST["name"];
            header("Location: " . URL . "employee/dashboard");
            exit;
        } else {
            header("Location: " . URL . "");
            exit;
        }
    }

    public function logout() {
        $this->model->checkLogout();
        header("Location: " . URL . "");
        exit;
    }


}