<?php

namespace App\Util;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Psr\Log\LoggerInterface;
use Monolog\Level;

class LogFactory
{
    public static function getLogger(string $canal = "concurso") : LoggerInterface
    {
        $log = new Logger($canal);
        $log->pushHandler(new StreamHandler("logs/accesos.log", Level::Info));

        return $log;
    }
}
