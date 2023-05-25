<?php
    class Payment extends Controller{
        public function index(){
            if (!isset($_SESSION["account"])) {
                header("Location: /login");
                exit();
            }
            if (!isset($_SESSION["booking"])) {
                header("Location: /mybooking");
                exit();
            }
            $_SESSION["paymentMethod"] = "dana";
            $data["title"] = "Payment";
            $data["style"] = "payment";
            $data["script"] = "payment";
            $this->view("tamplates/header",$data);
            $this->view("tamplates/header-content");
            $this->view("Payment/payment");
            $this->view("tamplates/footer",$data);
        }
        public function setPaymentMethod(){
            $_SESSION["paymentMethod"] = $_POST["paymentMethod"];
        }
        public function checkout(){
            if ($this->model("CustomerModel")->checkout($_POST["checkout"]) > 0) {
                echo "berhasil";
            }
        }
    }
?>