<?php
    class Register extends Controller{
        public function index(){
            $this->view("Register/register");
        }
        public function registerCustomer(){
            if (isset($_POST["registerbutton"])) {
                $this->model("CustomerModel")->register($_POST);
                header("Location: /login");
                exit;
            }
        }
    }
?>