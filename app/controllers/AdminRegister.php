<?php
    class AdminRegister extends Controller{
        public function index(){
            $data["title"] = "Admin Register";
            $data["style"] = "register";
            $data["script"] = "register";
            $this->view("tamplates/header",$data);
            $this->view("AdminRegister/admin-register");
            $this->view("tamplates/footer",$data);
        }
        public function register(){
            if ($this->model("AdminModel")->register($_POST) > 0) {
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