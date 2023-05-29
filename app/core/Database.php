<?php
    class Database{
        private $host = DB_HOST;
        private $user = DB_USER;
        private $password = DB_PASS;
        private $dbName = DB_NAME;
        private $dbhandler;
        private $statement;

        public function __construct(){
            $source = "mysql:host=" . $this->host . ";dbname=" . $this->dbName;
            $option = [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];
            try {
                $this->dbhandler = new PDO($source,$this->user,$this->password,$option);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function query($query){
            $this->statement = $this->dbhandler->prepare($query);
        }
        public function bind($arg,$value,$type = null){
            if (is_null($type)) {
                if(is_int($value)) $type = PDO::PARAM_INT;
                elseif(is_bool($value)) $type = PDO::PARAM_BOOL;
                elseif(is_null($value)) $type = PDO::PARAM_NULL;
                else $type = PDO::PARAM_STR;
            }
            $this->statement->bindValue($arg,$value,$type);
        }
        public function execute(){
            try {
                $this->statement->execute();
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage() . " in " . $e->getFile() . " on line " . $e->getLine();
            }
        }
        public function results(){
            $this->execute();
            return $this->statement->fetchAll(PDO::FETCH_ASSOC);
        }
        public function result(){
            $this->execute();
            return $this->statement->fetch(PDO::FETCH_ASSOC);
        }
        public function row(){
            return $this->statement->rowCount();
        }
    }
?>