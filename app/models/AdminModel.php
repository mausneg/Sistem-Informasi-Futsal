<?php
    class AdminModel{
        private $db; 

        public function __construct(){
            $this->db = new Database();
        }
        public function countCustomer(){
            $this->db->query("select * from customer");
            $this->db->execute();
            $data = $this->db->row();
            return $data;
        }
        public function countBooking(){
            $this->db->query("select * from booking");
            $this->db->execute();
            $data = $this->db->row();
            return $data;
        }
        public function countDone(){
            $this->db->query("select * from booking where booking_status = 'done'");
            $this->db->execute();
            $data = $this->db->row();
            return $data;
        }
        public function getTransaction(){
            $this->db->query("SELECT 
                booking.no_booking,
                customer.username_customer,
                booking.field_name,
                DATE(booking.date),
                SUBSTRING(TIME(booking.date), 1, 8) AS date
                FROM customer
                INNER JOIN booking ON customer.email_customer = booking.email_customer
                WHERE booking.no_booking IN (SELECT no_booking FROM payment) 
                ORDER BY booking.date DESC 
                LIMIT 3");
            $this->db->execute();
            return $this->db->results();
        }
        public function getBooking(){
            $this->db->query("select * from booking order by no_booking desc");
            $this->db->execute();
            return $this->db->results();
        }
        
        
    }  
?>