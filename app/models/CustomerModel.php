<?php
    class CustomerModel{
        private $db; 

        public function __construct(){
            $this->db = new Database();
        }
        public function register($data){
            $query = "insert into customer values(:email,:username,:contact,:password)";
            $this->db->query($query);
            $this->db->bind("email",$data["email"]);
            $this->db->bind("username",$data["username"]);
            $this->db->bind("contact",$data["contact"]);
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

            $query = "select * from booking where email_customer = :email order by no_booking desc limit 1";
            $this->db->query($query);
            $this->db->bind("email",$_SESSION["account"]["email"]);
            return $this->db->result();
        }
        public function getBooking($status){
            if ($status == "*"){ 
                $query = "select no_booking,field_name,date,booking_status from booking where email_customer = :email order by no_booking desc";
                $this->db->query($query);
                $this->db->bind("email",$_SESSION["account"]["email"]);
            }
            else{
                $query = "select no_booking,field_name,date,booking_status from booking where booking_status = :status and email_customer = :email order by no_booking desc";
                $this->db->query($query);
                $this->db->bind("email",$_SESSION["account"]["email"]);
                $this->db->bind("status",$status);
            } 
            return $this->db->results();
        }
        public function getBookingCheckout($noBooking){
            $query = "select * from booking where no_booking = :no";
            $this->db->query($query);
            $this->db->bind("no",$noBooking);
            return $this->db->result();
        }
        public function deleteBooking($noBooking){
            $query = "update booking set booking_status = 'cancelled' where no_booking = :no";
            $this->db->query($query);
            $this->db->bind("no",$noBooking);
            $this->db->execute();
            return $this->db->row();
        }
        public function checkout($data){
            $query = "insert into payment values('',:noBooking,:idPaymentMethod,:paymentMethod,:amount,NOW())";
            $this->db->query($query);
            $this->db->bind("noBooking",$data["checkout"]["noBooking"]);
            $this->db->bind("idPaymentMethod",$data["checkout"]["idPaymentMethod"]);
            $this->db->bind("paymentMethod",$_SESSION["paymentMethod"]);
            $this->db->bind("amount",$data["checkout"]["amount"]);
            $this->db->execute();

            $query = "update booking set booking_status = 'pending' where no_booking = :noBooking";
            $this->db->query($query);
            $this->db->bind("noBooking",$data["checkout"]["noBooking"]);
            $this->db->execute();
            return $this->db->row();
        }
        public function getSchedule($date){
            $query = "SELECT (SELECT username_customer FROM customer WHERE email_customer = booking.email_customer) AS username,DATE_FORMAT(date, '%H:%i:%s') AS time FROM booking WHERE DATE(date) = :date and booking_status = 'confirm' order by date";
            $this->db->query($query);
            $this->db->bind("date",$date);
            return $this->db->results();
        }
    }
?>`