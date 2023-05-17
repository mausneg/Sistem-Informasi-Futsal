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
                if (password_verify($_POST["password"],$data["password"])) {
                    $_SESSION["account"] = [
                        "email" => $data["email"],
                        "username" => $data["username"],
                        "contact" => $data["contact"],
                        "password" => $data["password"]
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