<?php 

// require 'LoggerInterface.php';
// require 'FileLogger.php';
// require 'ServiceContainer.php';
// require 'LoggerServiceProvider.php';

// /*Create A Service Container*/
// $container = new ServiceContainer();

// /*Register the logger service provider*/
// $loggerServiceProvider =new LoggerServiceProvider();
// $loggerServiceProvider->register($container);

// /*Resolve the logger service and use it*/ 
// $logger = $container->make('logger');
// $logger->log('Server Error: MYSQL Database Not Found');

interface LoggerInterface{
    public function log(string $message);
}

class FileLogger implements LoggerInterface{
    public function log(string $message){
        file_put_contents('server_log.txt', $message . PHP_EOL, FILE_APPEND);
    }
}

class ServiceContainer{
    protected $bindings=[]; 
    public function bind($request , $resolve){
        $this->bindings[$request]=$resolve; 
    }
    public function make($name){
        if (isset($this->bindings[$name])) {
            return call_user_func($this->bindings[$name]);
        } throw new Exception("Service {$name} not found.");
    }
}

class ServiceProvider{
    public function make(ServiceContainer $container){
        $container->bind('logger',function(){
            return new FileLogger();
        });
    }
}
class LoggerServiceProvider{
    public function register(ServiceContainer $container) {
        $container->bind('logger', function() {
            return new FileLogger();
        });
    }
}
$container = new ServiceContainer();
$ServiceProvider =new LoggerServiceProvider();
$ServiceProvider->register($container);

 $logger = $container->make('logger');
 $logger->log('Server Error: MYSQL Database Not Found');