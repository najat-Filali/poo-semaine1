<?php

namespace App\Core\Logger;

class FileLogger implements LoggerInterface {


    public function error(int $code, string $msg): void
    {
        file_put_contents(__DIR__. "../../../logs","ERROR ".$code." : ".$msg."\n", FILE_APPEND);
    }

    public function log(string $msg): void
    {
        file_put_contents(__DIR__. "../../../../logs",date("d-m-Y h:i:s") . " " .$msg . "\n", FILE_APPEND);   
    }
}




