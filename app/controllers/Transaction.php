<?php
    class Transaction extends Controller{
        public function index(){
            // if (!isset($_SESSION["account"])) {
            //     header("Location: /login");
            //     exit();
            // }
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
            if($this->model('AdminModel')->updateStatus($_POST["transaction"])>0){
                Flasher::setFlash("Transaction has been updated","success");
            }          
            exit();
        }
    }
?>