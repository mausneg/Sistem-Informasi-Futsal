<?php
   $test = array(
        "email" => "test@gmail.com",
        "nama" => "maul",
        "contact" => "123",
   );
   $i = 0;
   foreach ($test as $key => $value) {
        echo ++$i . $value . PHP_EOL;
   }
?>