<?php

namespace App\Core\Logger;

interface LoggerInterface {
    function error(int $code, string $msg):void;
    function log(string $msg): void;
}




