<?php
    class Flasher{
        public static function setFlash($message,$type){
            $_SESSION["flash"] = [
                "message" => $message,
                "type" => $type
            ];
        }
        public static function flash(){
            if (isset($_SESSION["flash"])) {
                echo "
                    <div class='flasher flasher-".$_SESSION['flash']['type']."'>". $_SESSION["flash"]["message"]."
                        <button class='flasher-button flasher-".$_SESSION['flash']['type']."'>x</button>
                    </div>
                ";
                unset($_SESSION["flash"]);
            }
        }
    }
?>