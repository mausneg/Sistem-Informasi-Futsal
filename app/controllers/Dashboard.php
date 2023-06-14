<?php
    class Dashboard extends Controller{
        public function index(){
            if (!isset($_SESSION["account"])) {
                header("Location:".BASEURL."login");
                exit();
            }
            $data["title"] = "Dashboard";
            $data["style"] = "dashboard";
            $data["script"] = "dashboard";
            $this->view('tamplates/admin-header',$data);
            $this->view('tamplates/admin-header-content');
            $this->view('Dashboard/dashboard');
            $this->view('tamplates/admin-footer',$data);
        }
        public function countCustomer(){
            $data = $this->model("AdminModel")->countCustomer();
            if ($data == 0) echo "0";
            else echo $data;
        }
        public function countBooking(){
            $data = $this->model("AdminModel")->countBooking();
            if ($data == 0) echo "0";
            else echo $data;
        }
        public function countDone(){
            $data = $this->model("AdminModel")->countDone();
            if ($data == 0) echo "0";
            else echo $data;
        }
        public function getTransaction(){
            $data = $this->model("AdminModel")->getTransaction();
            foreach ($data as $row) {
                foreach ($row as $key => $value) {
                    echo $value . " ";
                }
                echo "\n";
            }
            exit;
        }
    }
?>