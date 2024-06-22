<?php

namespace App\Interface; 

interface PostRepositoryInterface {
    public function findAll();
    public function find($id);
    public function save(Post $post);
    public function delete($id);
}