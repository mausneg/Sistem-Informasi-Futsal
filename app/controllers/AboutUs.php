<?php
    class AboutUs extends Controller{
        public function index(){
            if (!isset($_SESSION["account"])) {
                header("Location: /login");
                exit();
            }
            $data["title"] = "About Us";
            $data["style"] = "aboutus";
            $data["script"] = "aboutus";
            $this->view("tamplates/header",$data);
            $this->view("tamplates/header-content");
            $this->view("AboutUs/aboutus");
            $this->view("tamplates/footer",$data);
        }
    }
?>