<?php
    class Home extends Controller{
        public function index(){
            $data["title"] = "Home";
            $data["style"] = "home";
            $data["script"] = "home";
            $this->view("tamplates/header",$data);
            $this->view("Home/home");
            $this->view("tamplates/footer",$data);
        }
    }
?>