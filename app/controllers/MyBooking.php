<?php
    class MyBooking extends Controller{
        public function index(){
            if (!isset($_SESSION["account"])) {
                header("Location:".BASEURL."login");
            }
            $data["title"] = "My Booking";
            $data["style"] = "mybooking";
            $data["script"] = "mybooking";
            $this->view("tamplates/header",$data);
            $this->view("tamplates/header-content");
            $this->view("MyBooking/mybooking");
            $this->view("tamplates/footer",$data);
        }
        public function getBooking(){
            $status = $_POST["status"];
            $data = $this->model("CustomerModel")->getBooking($status);
            foreach ($data as $row) {
                foreach ($row as $key => $value) {
                    echo $value . " ";
                }
                echo "\n";
            }
            exit;
        }
        public function checkout(){
            $data = $this->model("CustomerModel")->getBookingCheckout($_POST["noBooking"]);
            $amount = 0;
            if($data["field_name"] == "vinyl") $amount = 150000;
            else $amount = 120000;
            $_SESSION["booking"] = [
                "no" => $data["no_booking"],
                "field" => $data["field_name"],
                "date" => $data["date"],
                "status" => $data["booking_status"],
                "email" => $data["email_customer"],
                "amount" => $amount
            ];
            exit;
        }
        public function cancel(){
            if ($this->model("CustomerModel")->deleteBooking($_POST["noBooking"]) > 0) {
                Flasher::setFlash("Booking has been cancelled","success");
                unset($_SESSION["booking"]);
            }
            exit;

        }
    }
?>