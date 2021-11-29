<?php

class LoginModel extends Model
{
    public function __construct() {
        parent::__construct();
    }

    public function checkLogin($name, $password) {
        // $this->db->query('SELECT * FROM users WHERE name = ? AND password = ?;');

        // $passwordHarsh =  password_hash($password, PASSWORD_DEFAULT);

        // //Bind value
        // $this->db->bind(1, $name);
        // $this->db->bind(2, $passwordHarsh);

        // $row = $this->db->single();

        // $hashedPassword = $row->password;

        // if (password_verify($password, $hashedPassword)) {
        //     return true;
        // } else {
        //     return false;
        // }
    }
}