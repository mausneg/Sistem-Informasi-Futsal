<?php
    class Feedback extends Controller{
        public function index(){
            $data["title"] = "Feedback";
            $data["style"] = "feedback";
            $data["script"] = "feedback";
            $this->view("tamplates/header",$data);
            $this->view("tamplates/header-content",$data);
            $this->view("Feedback/feedback");
            $this->view("tamplates/footer",$data);
        }
    }
?>