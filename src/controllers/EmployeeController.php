<?php

class EmployeeController extends Controller
{
    public $id;
    public function __construct()
    {
        parent::__construct();

        $this->loadModel('employee');
    }

    function dashboard()
    {

        $this->view->render('employee/dashboard');
    }

    function showEmployee()
    {
        $this->view->render('employee/employee');
    }


    public function getEmployees()
    {
        $employees = $this->model->get();
        echo json_encode($employees);
    }
}
