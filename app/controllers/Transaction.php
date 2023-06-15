<?php
    class Transaction extends Controller{
        public function index(){
            if (!isset($_SESSION["account"])) {
                header("Location:".BASEURL."login");
                exit();
            }
            $data["title"] = "Transaction";
            $data["style"] = "transaction";
            $data["script"] = "transaction";
            $this->view('tamplates/admin-header',$data);
            $this->view('tamplates/admin-header-content');
            $this->view('Transaction/transaction');
            $this->view('tamplates/admin-footer',$data);
        }
        public function getTransactions(){
            $data = $this->model('AdminModel')->getTransactions();
            foreach ($data as $row) {
                foreach ($row as $key => $value) {
                    echo $value . " ";
                }
                echo "\n";
            }
            exit;
        }
        public function updateStatus(){
            $this->model('AdminModel')->updateStatus($_POST["transaction"]);
            Flasher::setFlash("Transaction has been updated","success");         
            exit();
        }
        public function updateMethod(){
            $this->model('AdminModel')->updateMethod($_POST["transaction"]);
            Flasher::setFlash("Transaction has been updated","success");         
            exit();
        }
        public function updateNumber(){
            $this->model('AdminModel')->updateNumber($_POST["transaction"]);
            Flasher::setFlash("Transaction has been updated","success");         
            exit();
        }
        public function countPaid(){
            $data = $this->model('AdminModel')->countPaid();
            if($data == '0') $data = 0;
            echo $data;
        }
        public function countUnpaid(){
            $data = $this->model('AdminModel')->countUnpaid();
            if($data == '0') $data = 0;
            echo $data;
        }
    }
?>