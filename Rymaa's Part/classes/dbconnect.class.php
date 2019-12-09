<?php
  class baseDonnee{
        private $dbhost="localhost";
        private $dbname="resto";
        private $dbuser="root";
        private $dbpwd="";

        public $con=null;
        
        public function connectBD(){        
            try {
                $this->con = new PDO("mysql:host=".$this->dbhost.";dbname=".$this->dbname,$this->dbuser,$this->dbpwd,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ] 
            );
            } catch (PDOException $e) {
                echo "an exception:".$e->getMessage();            }
            return $this->con;
    }
}