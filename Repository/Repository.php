<?php

interface UserRepositoryInterface{
    public function index(); //no body in this method
    public function create();
    public function view(); 
    public function update();
    public function delete();
}

class UserRepository implements UserRepositoryInterface{
    public function index(){
        echo "this is index";
    }
    public function create(){
        echo "this is create";
    }
    public function view(){
        echo "this is view";
    }
    public function update(){
        echo "this is update";
    }
    public function delete(){
        echo "this is delete";
    }
}

$repo=new UserRepository();
$repo->index();
echo '<br>';
$repo->update();
echo '<br>';
$repo->delete();
echo '<br>';