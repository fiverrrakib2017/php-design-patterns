<?php

class FileLogger implements LoggerInterface{
    public function log(String $string){
        file_put_contents('server_log.txt', $string . PHP_EOL, FILE_APPEND);
    }
}
