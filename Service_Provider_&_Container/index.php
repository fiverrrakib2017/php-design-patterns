<?php 

require 'LoggerInterface.php';
require 'FileLogger.php';
require 'ServiceContainer.php';
require 'LoggerServiceProvider.php';

/*Create A Service Container*/
$container = new ServiceContainer();

/*Register the logger service provider*/
$loggerServiceProvider =new LoggerServiceProvider();
$loggerServiceProvider->register($container);

/*Resolve the logger service and use it*/ 
$logger = $container->make('logger');
$logger->log('Server Error: MYSQL Database Not Found');