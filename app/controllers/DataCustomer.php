<?php
    class DataCustomer extends Controller{
        public function index(){
            // if (!isset($_SESSION["account"])) {
            //     header("Location: /login");
            //     exit();
            // }
            $data["title"] = "Data Customer";
            $data["style"] = "data-customer";
            $data["script"] = "data-customer";
            $this->view('tamplates/admin-header',$data);
            $this->view('tamplates/admin-header-content');
            $this->view('DataCustomer/data-customer');
            $this->view('tamplates/admin-footer',$data);
        }
        public function getCustomer(){
            $data = $this->model('AdminModel')->getCustomer();
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