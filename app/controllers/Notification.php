<?php
    class Notification extends Controller{
        public function getNotif(){
            $data = $this->model('CustomerModel')->getNotif();
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