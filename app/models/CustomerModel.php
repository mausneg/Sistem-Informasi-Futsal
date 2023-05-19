<?php
    class CustomerModel{
        private $table = "customer";
        private $db; 

        public function __construct(){
            $this->db = new Database();
        }
        public function register($data){
            $query = "insert into " . $this->table . " values(:email,:username,:contact,:password,:pp)";
            $this->db->query($query);
            $this->db->bind("email",$data["email"]);
            $this->db->bind("username",$data["username"]);
            $this->db->bind("contact",$data["contact"]);
            $this->db->bind("pp","");
            $this->db->bind("password",password_hash($data["password"],PASSWORD_DEFAULT));
            $this->db->execute();
            return $this->db->row();
        }
        public function edit($data){
            $query = "update " . $this->table . " set username_customer = :username, contact_customer = :contact, password_customer = :password where email_customer = :email";
            $this->db->query($query);
            $this->db->bind("email",$data["email"]);
            $this->db->bind("username",$data["username"]);
            $this->db->bind("contact",$data["contact"]);
            $this->db->bind("password",password_hash($data["confirm-password"],PASSWORD_DEFAULT));
            $this->db->execute();
            return $this->db->row();
        }
        public function delete(){
            $query = "delete from " . $this->table . " where email_customer = :email";
            $this->db->query($query);
            $this->db->bind("email", $_SESSION["account"]["email"]);
            $this->db->execute();
            return $this->db->row();
        } 
    }
?>`