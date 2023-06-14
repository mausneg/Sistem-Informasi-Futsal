<?php
    class Login extends Controller{
        public function index(){
            $data["title"] = "Login";
            $data["style"] = "login";
            $data["script"] = "login";
            $this->view("tamplates/header",$data);
            $this->view("Login/login");
            $this->view("tamplates/footer",$data);
        }
        public function login(){
            if (isset($_POST["loginbutton"])) {
                $data = $this->model("CustomerModel")->login($_POST);
                if(isset($data["email_customer"])){
                    if (password_verify($_POST["password"],$data["password_customer"])) {
                        $_SESSION["account"] = [
                            "email" => $data["email_customer"],
                            "username" => $data["username_customer"],
                            "contact" => $data["contact_customer"],
                            "password" => $_POST["password"],
                        ];
                        Flasher::setFlash("Login Success","success");
                        header("Location:".BASEURL."home");
                        exit;
                    }else{
                        Flasher::setFlash("Login Fail","fail");
                        header("Location:".BASEURL."login");
                        exit;
                    }
                }
                $data = $this->model("AdminModel")->login($_POST);
                if(isset($data["email_admin"])){
                    if (password_verify($_POST["password"],$data["password_admin"])) {
                        $_SESSION["account"] = [
                            "email" => $data["email_admin"],
                            "username" => $data["username_admin"],
                            "password" => $_POST["password"],
                        ];
                        Flasher::setFlash("Login Success","success");
                        header("Location:".BASEURL."dashboard");
                        exit;
                    }else{
                        Flasher::setFlash("Login Fail","fail");
                        header("Location:".BASEURL."login");
                        exit;
                    }
                }
                Flasher::setFlash("Login Fail","fail");
                header("Location:".BASEURL."login");
                exit;
            }
        }
    }
?>