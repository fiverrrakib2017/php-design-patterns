<?php

class ServiceContainer{
    protected $bindings=[];   

    public function bind($name,$resolve){
        $this->bindings[$name]=$resolve; 
    }

    public function make($name){
        if(isset($this->bindings[$name])) {
            return call_user_func($this->bindings[$name]);
        }

        throw new Exception("Service {$name} not found.");
    }
}