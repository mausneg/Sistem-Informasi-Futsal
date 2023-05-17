<?php
    class CustomerModel{
        private $table = "customer";
        private $db; 

        public function __construct(){
            $this->db = new Database();
        }
        public function register($data){
            $query = "insert into " . $this->table . " values(:email,:username,:contact,:password)";
            $this->db->query($query);
            $this->db->bind("email",$data["email"]);
            $this->db->bind("username",$data["username"]);
            $this->db->bind("contact",$data["contact"]);
            $this->db->bind("password",password_hash($data["password"],PASSWORD_DEFAULT));
            $this->db->execute();
            return $this->db->row();
        }
    }
?>`