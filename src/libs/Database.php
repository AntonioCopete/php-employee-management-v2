<?php

// class Database
// {
//     private $dbHost;
//     private $dbUser;
//     private $dbPass;
//     private $dbName;
//     private $dbCharset;

//     private $statement;
//     private $dbHandler;
//     private $error;

//         public function __construct() {

//             $this->dbHost = constant('HOST');
//             $this->dbName = constant('DB');
//             $this->dbUser = constant('USER');
//             $this->dbPass = constant('PASSWORD');
//             $this->dbCharset = constant('CHARSET');

//             $conn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName;
//             $options = array(
//                 PDO::ATTR_PERSISTENT => true,
//                 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
//             );
//             try {
//                 $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);
//             } catch (PDOException $e) {
//                 $this->error = $e->getMessage();
//                 echo $this->error;
//             }
//         }

//     public function query($sql) {
//         $this->statement = $this->dbHandler->prepare($sql);
//     }
// }


class Database
{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct()
    {
        $this->host = constant('HOST');
        $this->db = constant('DB');
        $this->user = constant('USER');
        $this->password = constant('PASSWORD');
        $this->charset = constant('CHARSET');
    }

    function connect() {
        try {
            $connection = "mysql:host=" . $this->host . ";"
            . "dbname=" . $this->db . ";"
            . "charset=" . $this->charset . ";";

            $options = [
                PDO::ATTR_ERRMODE           =>  PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES  => FALSE,
            ];

            $pdo = new PDO($connection, $this->user, $this->password, $options);

            return $pdo;
        } catch (PDOException $e) {
            print_r('Error connection: ' . $e->getMessage());
        }
    }
}


