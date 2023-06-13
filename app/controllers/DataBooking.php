<?php
    class DataBooking extends Controller{
        public function index(){
            // if (!isset($_SESSION["account"])) {
            //     header("Location: /login");
            //     exit();
            // }
            $data["title"] = "Data Booking";
            $data["style"] = "data-booking";
            $data["script"] = "data-booking";
            $this->view('tamplates/admin-header',$data);
            $this->view('tamplates/admin-header-content');
            $this->view('DataBooking/data-booking');
            $this->view('tamplates/admin-footer',$data);
        }
        public function getBooking(){
            $data = $this->model('AdminModel')->getBooking();
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