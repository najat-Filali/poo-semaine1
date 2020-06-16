<?php

namespace App\Core\Logger;

class EchoLogger implements LoggerInterface {

    public function error(int $code, string $msg): void
    {
        echo "ERROR ".$code." : ".$msg."\n";
    }

    public function log(string $msg): void
    {
        
        echo  date("d-m-Y h:i:s") . " " .$msg . "\n";
        
    }
}


