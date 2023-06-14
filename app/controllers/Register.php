<?php
    class Register extends Controller{
        public function index(){
            $data["title"] = "Register";
            $data["style"] = "register";
            $data["script"] = "register";
            $this->view("tamplates/header",$data);
            $this->view("Register/register");
            $this->view("tamplates/footer",$data);
        }
        public function register(){
            if ($this->model("CustomerModel")->register($_POST) > 0) {
                Flasher::setFlash("Register Success","success");
                header("Location:".BASEURL."login");
                exit;
            }
            else{
                Flasher::setFlash("Register Fail","fail");
                header("Location:".BASEURL."register");
                exit;
            }
        }
    }
?>