<?php

namespace DatingApp;

use mysql_xdevapi\Exception;

class DatingApp
{

    /* Skapar en privat variabel för PDO Objektet */
    private $pdo;

    /* Dubbel underscore före construct */
    function __construct($password)
    {
        $opt = []; // Extra options för PDO definieras i denna

        try {
            $this->pdo = new \PDO("mysql:host=cgi.arcada.fi;dbname=edgrenjo",
                "edgrenjo", $password, $opt);
        } catch (Exception $e) {
            var_dump($e);
        }
    }

    public function getUsers(){
        $s = $this->pdo->prepare("SELECT * FROM annonser");
        $s->execute();
        return $s->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function registerUser($user){
        $s = $this->pdo->prepare("INSERT INTO annonser
            (username, fullname, password, email, city, aboutme, salary, preference)
            VALUES(:username, :fullname, :password, :email,:city, :aboutme, :salary, :preference)");
        $s->execute(array(
            ":username" => $user['username'],
            ":fullname" => $user['fullname'],
            ":password" => $user['password'],
            ":email" => $user['email'],
            ":city" => $user['city'],
            ":aboutme" => $user['aboutme'],
            ":salary" => $user['salary'],
            ":preference" => $user['preference']
        ));
        return $s->rowCount();
    }


}