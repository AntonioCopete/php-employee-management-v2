<?php
require_once 'entities/Employee.php';

class EmployeeModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $items = [];

        try {
            $query = $this->db->connect()->query("SELECT * FROM employee;");
            while ($row = $query->fetch()) {
                $item = new Employee();

                $item->id = $row['id'];
                $item->name = $row['name'];
                $item->lastName = $row['lastName'];
                $item->email = $row['email'];
                $item->gender = $row['gender'];
                $item->age = $row['age'];
                $item->phoneNumber = $row['phoneNumber'];
                $item->addressId = $row['addressId'];

                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            echo $e;
        }
    }
}


