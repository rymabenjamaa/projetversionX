<?php 

include 'dbconnect.class.php';

class User {
    private $pdo;

    function __construct()
    {
        $con = new baseDonnee;
        $this->pdo = $con->connectBD();

    }
 public function register($username,$phone,$email,$pass)
    {
        try {
            $sql = "INSERT INTO employe (nom,phone,email,password)
                    VALUES (:username,:phno,:email,:password)";
            $query = $this->pdo->prepare($sql);
            $query->bindparam(":username", $username);
            $query->bindparam(":phno", $phone);
            $query->bindparam(":email", $email);
            $query->bindparam(":password", $pass);

            $query->execute();
            return $query;
        } 
        catch (PDOException $ex) {
        echo "an exception:". $ex->getMessage();
        }
    }

    public function login ($username, $pass)
    {
        try {
            $sql = "SELECT * FROM employe WHERE username= :username";
            $query = $this->pdo->prepare($sql);
            $query->bindparam(":username", $username);
            $query->execute();
            $User = $query->fetch();
            if (password_verify($pass, $User['password'])) {
                return $User;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
}