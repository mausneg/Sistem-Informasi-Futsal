<?php
    class Home extends Controller{
        public function index(){
            if (!isset($_SESSION["account"])) {
                header("Location:".BASEURL."login");
                exit();
            }
            $data["title"] = "Home";
            $data["style"] = "home";
            $data["script"] = "home";
            $this->view("tamplates/header",$data);
            $this->view("tamplates/header-content");
            $this->view("Home/home");
            $this->view("tamplates/footer",$data);
        }
        public function edit(){
            if (
                ($_SESSION["account"]["email"] == $_POST["email"] &&
                $_SESSION["account"]["username"] == $_POST["username"] &&
                $_SESSION["account"]["contact"] == $_POST["contact"] &&
                $_SESSION["account"]["password"] == $_POST["old-password"])
            ) {
                Flasher::setFlash("Edit Profile Fail","fail");
                header("Location:".BASEURL."/home");
                exit;
            }
            if ($_POST["old-password"] == $_SESSION["account"]["password"]) {
                if ($this->model("CustomerModel")->edit($_POST) > 0) {
                    $_SESSION["account"] = [
                        "email" => $_POST["email"],
                        "username" => $_POST["username"],
                        "contact" => $_POST["contact"],
                        "password" => $_POST["confirm-password"],
                        "pp" => $_POST["pp"]
                    ];
                    Flasher::setFlash("Edit Profile Success","success");
                    header("Location:".BASEURL."/home");
                    exit;
                }
                else{
                    Flasher::setFlash("Edit Profile Fail","fail");
                    header("Location:".BASEURL."/home");
                    exit;
                }
            }
            else{
                Flasher::setFlash("Edit Profile Fail","fail");
                header("Location:".BASEURL."/home");
                exit; 
            }
        }
        public function delete(){
            if ($this->model("CustomerModel")->delete($_POST) > 0) {
                session_destroy();
                Flasher::setFlash("Penghapusan Akun ","Berhasil","success");
                header("Location:".BASEURL."/login");
                exit; 
            }
        }
        public function booking(){
            $time = $_POST["bookingData"]["time"] . ":00:00";
            if((int)$_POST["bookingData"]["time"] < 10) $time = "0" . $time;
            $date = $_POST["bookingData"]["year"] . "-" . $_POST["bookingData"]["month"]+1 . "-" . $_POST["bookingData"]["day"];
            $dateTime = $date . " " . $time;
            $datetime = new DateTime($dateTime);
            $dateTime = $datetime->format('Y-m-d H:i:s');
            $booking = [
                "field" => $_POST["bookingData"]["field"],
                "dateTime" => $dateTime          
            ];
            $data = $this->model("CustomerModel")->booking($booking);
            $amount = 0;
            if($data["field_name"] == "vinyl") $amount = 150000;
            else $amount = 120000;
            if (isset($data)) {
                $_SESSION["booking"] = [
                    "no" => $data["no_booking"],
                    "field" => $data["field_name"],
                    "date" => $data["date"],
                    "status" => $data["booking_status"],
                    "email" => $data["email_customer"],
                    "amount" => $amount
                ];
                Flasher::setFlash("Booking Success","success");
                exit;
            }
            else{
                Flasher::setFlash("Booking Fail","fail");
                exit;
            }
        }
        public function getSchedule(){
            $date = $_POST["schedule"]["year"] . "-" . $_POST["schedule"]["month"]+1 . "-" . $_POST["schedule"]["date"];
            $date = new DateTime($date);
            $date = $date->format("Y-m-d");
            $data = $this->model("CustomerModel")->getSchedule($date);
            foreach ($data as $row) {
                foreach ($row as $key => $value) {
                    echo $value . " ";
                }
                echo "\n";
            }
            exit;
        }
        public function logOut(){
            session_destroy();
        }
    }
?>