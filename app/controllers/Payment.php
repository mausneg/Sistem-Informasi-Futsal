<?php
    class Payment extends Controller{
        public function index(){
            if (!isset($_SESSION["account"])) {
                header("Location:".BASEURL."login");
                exit();
            }
            if (!isset($_SESSION["booking"])) {
                header("Location:".BASEURL."mybooking");
                Flasher::setFlash("You haven't booking","info");
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
            $paymentNumber = [
                "dana" => "08123456789",
                "shopee" => "08198765432",
                "gopay" => "08987654321",
                "qris" => "Gambar QRIS",
            ];
            $_SESSION["paymentMethod"] = $_POST["paymentMethod"];
            $_SESSION["paymentNumber"] = $paymentNumber[$_POST["paymentMethod"]];
        }
        public function checkout(){
            if ($this->model("CustomerModel")->checkout($_POST) > 0) {
                $_SESSION["summary"] = true;
            }
        }
        public function summary(){
            if (!isset($_SESSION["account"])) {
                header("Location: ".BASEURL."login");
                exit();
            }
            if (!isset($_SESSION["booking"])) {
                header("Location: ".BASEURL."mybooking");
                exit();
            }
            if (!isset($_SESSION["summary"])) {
                header("Location: ".BASEURL."payment");
                exit();
            }
            $data["title"] = "Payment";
            $data["style"] = "payment";
            $data["script"] = "payment";
            $this->view("tamplates/header",$data);
            $this->view("tamplates/header-content");
            $this->view("Payment/summary");
            $this->view("tamplates/footer",$data);
        }
        public function reset(){
            unset($_SESSION["booking"]);
            unset($_SESSION["summary"]);
            exit;
        }
    }
?>