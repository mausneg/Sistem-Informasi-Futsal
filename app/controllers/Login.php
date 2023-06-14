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
                $data = $this->model("UnknownModel")->login($_POST);
                if (password_verify($_POST["password"],$data["password_customer"])) {
                    $_SESSION["account"] = [
                        "email" => $data["email_customer"],
                        "username" => $data["username_customer"],
                        "contact" => $data["contact_customer"],
                        "password" => $_POST["password"],
                        "pp" => $data["pp_customer"]
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
        }
    }
?>