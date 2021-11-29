<?php

class EmployeeController extends Controller
{
    public $id;
    public function __construct()
    {
        parent::__construct();

        $this->view->render('employee/dashboard');
    }
    public function getEmployees()
    {
        $employees = $this->model->get();
    }
}
