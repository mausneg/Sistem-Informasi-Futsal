<?php
    class UnknownModel{
        private $db; 

        public function __construct(){
            $this->db = new Database();
        }
        public function login($data){
            $query = "select * from customer where username= :username or email= :username";
            $this->db->query($query);
            $this->db->bind("username",$data["username"]);
            $dataDB =  $this->db->result();
            if (isset($dataDB)) {
                return $dataDB;
            }else{
                $query = "select * from admin where username= :username or email= :username";
                $this->db->query($query);
                $this->db->bind("username",$data["username"]);
                $dataDB =  $this->db->result();
                return $dataDB;
            }
        }
    }
?>