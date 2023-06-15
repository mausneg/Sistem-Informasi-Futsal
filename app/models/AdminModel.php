<?php
    class AdminModel{
        private $db; 

        public function __construct(){
            $this->db = new Database();
        }
        public function register($data){
            $query = "insert into admin values (:email,:username,:password)";
            $this->db->query($query);
            $this->db->bind("username",$data["username"]);
            $this->db->bind("email",$data["email"]);
            $this->db->bind("password",password_hash($data["password"],PASSWORD_DEFAULT));
            $this->db->execute();
            return $this->db->row();
        }
        public function login($data){
            $query = "select * from admin where username_admin= :username or email_admin= :username";
            $this->db->query($query);
            $this->db->bind("username",$data["username"]);
            return $this->db->result();
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
        public function getCustomer(){
            $this->db->query("select * from customer");
            $this->db->execute();
            return $this->db->results();
        }
        public function getTransactions(){   
            $this->db->query("select * from payment order by no_booking desc");
            $this->db->execute();
            return $this->db->results();
        }
        public function updateStatus($data){
            $this->db->query("update payment set status_payment = :status, email_admin = :admin where no_payment = :no");
            $this->db->bind("status",$data["status"]);
            $this->db->bind("admin",$_SESSION["account"]["email"]);
            $this->db->bind("no",$data["no_payment"]);
            $this->db->execute();
            
            $this->db->query("update booking set booking_status = :status where no_booking = :no");
            $this->db->bind("no",$data["no_booking"]);
            if($data["status"] == "paid") $this->db->bind("status","confirm");
            else $this->db->bind("status","pending");
            $this->db->execute();

            $this->db->query("delete from notification where no_booking = :no_booking");
            $this->db->bind("no_booking", $data["no_booking"]);
            $this->db->execute();
            if ($data["status"] == "paid") {
                $this->db->query("SELECT email_customer FROM booking WHERE no_booking = :no_booking");
                $this->db->bind("no_booking", $data["no_booking"]);
                $emailResult = $this->db->result();
                $this->db->query("INSERT INTO notification VALUES ('', :email_customer, 'payment_accept', NOW(), 0, :admin, :no_booking)");
                $this->db->bind("no_booking", $data["no_booking"]);
                $this->db->bind("email_customer", $emailResult["email_customer"]); 
                $this->db->bind("admin", $_SESSION["account"]["email"]);
                $this->db->execute();
                return $this->db->row();

            }
        }
        public function updateMethod($data){
            $this->db->query("update payment set method_payment = :method where no_payment = :no");
            $this->db->bind("method",$data["method"]);
            $this->db->bind("no",$data["no_payment"]);
            $this->db->execute();
        }
        public function updateNumber($data){
            $this->db->query("update payment set id_method_payment = :number where no_payment = :no");
            $this->db->bind("number",$data["number"]);
            $this->db->bind("no",$data["no_payment"]);
            $this->db->execute();
        }
        public function countPaid(){
            $this->db->query("select * from payment where status_payment = 'paid'");
            $this->db->execute();
            return $this->db->row();
        }
        public function countUnpaid(){
            $this->db->query("select * from payment where status_payment = 'unpaid'");
            $this->db->execute();
            return $this->db->row();
        }
    }  
?>