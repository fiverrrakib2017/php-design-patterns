<?php

class Article{
    private $title, $time; 
    public function __construct($title, $time) {
        $this->title = $title; 
        $this->time = $time; 
    }
    public function getTime() {
        return $this->time; 
    }
    public function getTitle() {
        return $this->title; 
    }
    public function displayTitle() {
        $title = $this->getTitle(); 
        $date = date("Y/m/d", $this->getTime());
        echo "{$title} was published on - {$date}";
    }
}

class ArticleTitleDecorator{
    private $article; 
    public function __construct(Article $article) {
        $this->article = $article;
    }
    public function displayTitle() {
        $title = $this->article->getTitle(); 
        $timeAgo = $this->timeAgo($this->article->getTime());
        echo "{$title} was published - {$timeAgo} ago";
    }
    public function timeAgo($time) {
        $diff = time() - $time; 
        if ($diff < 60) {
            return "{$diff} seconds";
        } elseif ($diff < 3600) {
            return intval($diff / 60) . " minutes";
        } elseif ($diff < 86400) {
            return intval($diff / 3600) . " hours";
        } else {
            return intval($diff / 86400) . " days";
        }
    }
}

$article = new Article("Article Title", time() - 3600); 
$decorator = new ArticleTitleDecorator($article);
$decorator->displayTitle();


/*
ডিপেন্ডেন্সি ইঞ্জেকশনের উদাহরণ:

ডিপেন্ডেন্সি কি?
একটি ক্লাস যখন অন্য কোনো ক্লাস বা অবজেক্টের উপর নির্ভরশীল থাকে, তখন সেটাকে ডিপেন্ডেন্সি বলা হয়। উদাহরণস্বরূপ, ধরুন একটি Car ক্লাসের কাজ করার জন্য একটি Engine ক্লাসের প্রয়োজন হয়। এখানে Engine হলো Car এর ডিপেন্ডেন্সি।


ইঞ্জেকশন কি?
ডিপেন্ডেন্সি ইঞ্জেকশন হলো সেই পদ্ধতি যার মাধ্যমে একটি ক্লাস তার ডিপেন্ডেন্সিগুলোকে বাইরের থেকে সরবরাহ (ইনজেক্ট) করা হয়। এতে করে ক্লাসের ভেতরে ডিপেন্ডেন্সি তৈরির প্রয়োজন হয় না।

*/

echo "<br>"; 
echo "<br>"; 
echo "<br>"; 
echo "<br>"; 
echo "<br>"; 

class Engine{
    public function start(){
        echo "Engine Started";
    }
}

class Car{
    private $engine=NULL; 
    public function __construct(Engine $engine)
    {   
        $this->engine=$engine; 
    }
    public function startCar(){
        $this->engine->start(); 
    }
}
/*Created by PhpStorm.*/

$engine=new Engine(); 
$car=new Car($engine); 

$car->startCar();