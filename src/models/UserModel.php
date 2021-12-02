<?php
require_once 'entities/User.php';

class UserModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $items = [];

        try {
            $query = $this->db->connect()->query("SELECT * FROM users;");
            while ($row = $query->fetch()) {
                $item = new User();

                $item->userId = $row['userId'];
                $item->name = $row['name'];
                $item->email = $row['email'];
                $item->role = $row['role'];

                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            echo $e;
        }
    }

}