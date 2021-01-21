<?php
    class Dbh{
        private $host = "localhost:3306";
        private $username = "root";
        private $pwd = "";
        private $dbn = "profile_system";

        public function connection(){
            try{
                $dsn = "mysql:host=".$this->host .";dbname=".$this->dbn;
                $pdo = new PDO($dsn, $this->username, $this->pwd);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                return $pdo;
            }catch(PDOException $e){
                echo $e->getMessage();
                exit;
            }
        }
    }