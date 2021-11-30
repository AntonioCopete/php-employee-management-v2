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
                $item->state = $row['state'];
                $item->postalCode = $row['postalCode'];
                $item->city = $row['city'];
                $item->streetAddress = $row['streetAddress'];

                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function create($_post)
    {
        $query = $this->db->connect()->prepare("INSERT INTO employee (name, lastName, email, gender, age, phoneNumber, state, postalCode, city, streetAddress) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");

        $query->bindParam(1, $_post["name"]);
        $query->bindParam(2, $_post["lastName"]);
        $query->bindParam(3, $_post["email"]);
        $query->bindParam(4, $_post["gender"]);
        $query->bindParam(5, $_post["age"]);
        $query->bindParam(1, $_post["phoneNumber"]);
        $query->bindParam(2, $_post["streetAddress"]);
        $query->bindParam(3, $_post["city"]);
        $query->bindParam(4, $_post["state"]);
        $query->bindParam(5, $_post["postalCode"]);

        try {
            $query->execute();
            return [true];
        } catch (PDOException $e) {
            return [false, $e];
        }
    }   

}
