<?php

class LoggerServiceProvider{
    public function register(ServiceContainer $container) {
        $container->bind('logger', function() {
            return new FileLogger();
        });
    }
}