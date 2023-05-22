<?php
    class CustomerModel{
        private $db; 

        public function __construct(){
            $this->db = new Database();
        }
        public function register($data){
            $query = "insert into customer values(:email,:username,:contact,:password,:pp)";
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
            $query = "update customer set username_customer = :username, contact_customer = :contact, password_customer = :password where email_customer = :email";
            $this->db->query($query);
            $this->db->bind("email",$data["email"]);
            $this->db->bind("username",$data["username"]);
            $this->db->bind("contact",$data["contact"]);
            $this->db->bind("password",password_hash($data["confirm-password"],PASSWORD_DEFAULT));
            $this->db->execute();
            return $this->db->row();
        }
        public function delete(){
            $query = "delete from customer where email_customer = :email";
            $this->db->query($query);
            $this->db->bind("email", $_SESSION["account"]["email"]);
            $this->db->execute();
            return $this->db->row();
        } 
        public function booking($data){
            $query = "insert into booking values('',:field,:date,:status,:email)";
            $this->db->query($query);
            $this->db->bind("field",$data["field"]);
            $this->db->bind("date",$data["dateTime"]);
            $this->db->bind("status","booked");
            $this->db->bind("email",$_SESSION["account"]["email"]);
            $this->db->execute();
            return $this->db->row();
        }
        public function getBooking($status){
            if ($status == "*"){ 
                $query = "select * from booking where email_customer = :email order by no_booking desc";
                $this->db->query($query);
                $this->db->bind("email",$_SESSION["account"]["email"]);
            }
            else{
                $query = "select * from booking where booking_status = :status and email_customer = :email order by no_booking desc";
                $this->db->query($query);
                $this->db->bind("email",$_SESSION["account"]["email"]);
                $this->db->bind("status",$status);
            } 
            return $this->db->results();
        }
    }
?>`