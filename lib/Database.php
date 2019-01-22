<?php

class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "oop";
    public $pdo;

    public function __construct(){
        if (!isset($this->pdo)) {
            try {
                $conn = new PDO("mysql:host=".$this->servername. ";dbname=".$this->dbname, $this->username, $this->password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // set the PDO error mode to exception
                $this->pdo = $conn;
                $conn->exec("SET CHARACTER SET utf8");
            }
            catch(PDOException $e){
                die("Connection failed: " . $e->getMessage());
            }
        }
        
    }
    
    
}


?>