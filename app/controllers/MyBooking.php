<?php
    class MyBooking extends Controller{
        public function index(){
            $data["title"] = "My Booking";
            $data["style"] = "mybooking";
            $data["script"] = "mybooking";
            $this->view("tamplates/header",$data);
            $this->view("tamplates/header-content");
            $this->view("MyBooking/mybooking");
            $this->view("tamplates/footer",$data);
        }
    }
?>