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
// ধরুন আমাদের একটি সিম্পল ব্লগ অ্যাপ্লিকেশন আছে যেখানে আমরা পোস্ট ম্যানেজ করব। প্রথমে আমাদের একটি পোস্ট ক্লাস তৈরি করতে হবে যা আমাদের মডেল হিসেবে কাজ করবে:
class Post {
    private $id;
    private $title;
    private $content;

    public function __construct($id, $title, $content) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    /* অন্যান্য গেটার এবং সেটার মেথড গুলো*/
}
interface PostRepositoryInterface {
    public function findAll();
    public function find($id);
    public function save(Post $post);
    public function delete($id);
}
$repo=new UserRepository();
$repo->index();
echo '<br>';
$repo->update();
echo '<br>';
$repo->delete();
echo '<br>';