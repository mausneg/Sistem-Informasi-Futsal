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
                    Flasher::setFlash("Login ","Berhasil","success");
                    header("Location: /home");
                    exit;
                }else{
                    Flasher::setFlash("Login ","Gagal","fail");
                    header("Location: /login");
                    exit;
                }

            }
        }
    }
?>