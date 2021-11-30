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

    public function createEmployee()
    {
        // echo "create Employee";
        $employee = $this->model->create($_POST);
        if ($employee) {
            header("Location: " . URL . "employee/dashboard");
            exit;
        }
    }

    public function createEmployeeJsGrid()
    {
        $employee = json_decode(file_get_contents("php://input"), true);
        $newEmployee = $this->model->create($employee);
        echo json_encode($newEmployee);
    }

    public function updateEmployeeJsGrid()
    {
        $employee = json_decode(file_get_contents("php://input"), true);
        $newEmployee = $this->model->update($employee);
        echo json_encode($newEmployee);
    }

    public function showEmployeeById($id)
    {
        $this->view->employee = $this->model->getEmployee($id);
        $this->view->render("employee/employee");
    }
}
