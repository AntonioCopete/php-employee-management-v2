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
        $query = $this->db->connect()->prepare("INSERT INTO employee (name, lastName, email, gender, age, phoneNumber, streetAddress, city, state, postalCode) VALUES (:name, :lastName, :email, :gender, :age, :phoneNumber, :streetAddress, :city, :state, :postalCode);");

        $query->bindParam(":name", $_post["name"]);
        $query->bindParam(":lastName", $_post["lastName"]);
        $query->bindParam(":email", $_post["email"]);
        $query->bindParam(":gender", $_post["gender"]);
        $query->bindParam(":age", $_post["age"]);
        $query->bindParam(":phoneNumber", $_post["phoneNumber"]);
        $query->bindParam(":streetAddress", $_post["streetAddress"]);
        $query->bindParam(":city", $_post["city"]);
        $query->bindParam(":state", $_post["state"]);
        $query->bindParam(":postalCode", $_post["postalCode"]);

        try {
            $query->execute();
            return [true];
        } catch (PDOException $e) {
            return [false, $e];
        }
    }

}
