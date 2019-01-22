<?php

include_once "Session.php";
include "Database.php";

class User {
    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function userRegistration($data){
        $name = $data["name"];
        $username = $data["username"];
        $email = $data["email"];
        $password = md5($data["password"]);
        $chk_email = $this->emailCheck($email);

        if (empty($name) OR empty($username) OR empty($email) OR empty($password)) {
            $msg = "<div class='alert alert-danger' role='alert'>
            Error!<br>
            <b>Field must not be empty </b>
            </div>";
            return $msg;
        }

        elseif (strlen($username) < 3) {
            $msg = "<div class='alert alert-danger' role='alert'>
            Error !<br>
            <b>username is too short! </b>
            </div>";
            return $msg;
        }

        elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $msg = "<div class='alert alert-danger' role='alert'>
            Error !<br>
            <b>This email address is not valid </b>
            </div>";
            return $msg;
        }

        elseif ($chk_email == true) {
            $msg = "<div class='alert alert-danger' role='alert'>
            Error !<br>
            <b>This email address already exists</b>
            </div>";
            return $msg;
        }

        $sql = "INSERT INTO tbl_user(name, username, email, password) VALUES (:name, :username, :email, :password)";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(":name", $name);
        $query->bindValue(":username", $username);
        $query->bindValue(":email", $email);
        $query->bindValue(":password", $password);
        $query->execute();
        $result = $query -> execute();
        if ($result) {
            $msg = "<div class='alert alert-success' role='alert'>
            Data succesfully saved.
            </div>";
            return $msg;
        }else{
            $msg = "<div class='alert alert-danger' role='alert'>
            Error !<br>
            <b>There has be a problem inserting your data</b>
            </div>";
            return $msg;
        }

    }
 
    public function userLogin($data){
        $email = $data["email"]; 
        $password = md5($data["password"]);
        $chk_email = $this->emailCheck($email);

        if (empty($email) OR empty($password)) {
            $msg = "<div class='alert alert-danger' role='alert'>
            Error!<br>
            <b>Field must not be empty </b>
            </div>";
            return $msg;
        }

        elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $msg = "<div class='alert alert-danger' role='alert'>
            Error !<br>
            <b>This email address is not valid </b>
            </div>";
            return $msg;
        }

        elseif ($chk_email == false) {
            $msg = "<div class='alert alert-danger' role='alert'>
            Error !<br>
            <b>This email address Not exists</b>
            </div>";
            return $msg;
        }

        $result = $this->getLoginUser($email, $password);
        if ($result) {
            Session::init();
            Session::set("login", true);
            Session::set("id", $result->id);
            Session::set("name", $result->name);
            Session::set("username", $result->username);
            Session::set("loginmsg", 
            "<div class='alert alert-success' role='alert'>
            Success!<br>
            <b>You are logged in</b>
            </div>");
            header("Location: index.php");
        }else {
            $msg = "<div class='alert alert-danger' role='alert'>
            Error !<br>
            <b>Data not found</b>
            </div>";
            return $msg;
        }
    }

    public function getLoginUser($email, $password){
        $sql = "SELECT * FROM tbl_user WHERE email = :email AND password = :password LIMIT 1";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(":email", $email);
        $query->bindValue(":password", $password);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }


    //Este metodo consiste en si el email existe y hace una consulta a la base de datos y mediante la instancia del objeto user y asu vez
    //Nos creamos un onejto de tipo Database que a su vez nos creamos un objeto public para poder acceder a las propiedades PDO en el constructor
    //de DataBase y en la variable pdo nos guardamos toda la conexión y la API de PDO por eso podemos acceder desde $query a los metodos que vemos.
    public function emailCheck($email){
        $sql = "SELECT email FROM tbl_user WHERE email = :email";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(":email", $email);
        $query->execute();
        if ($query->rowCount > 0 ) {
            return true;
        }else{
            return false;
        }
    }
}

?>