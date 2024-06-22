<?php

require 'Model/Post.php';
require 'postRepositoryInterface.php';
require 'postRepository.php';

/* PDO কানেকশন*/
$pdo = new PDO('mysql:host=localhost;dbname=laravel', 'username', 'password');
$postRepository = new PostRepository($pdo);

/* নতুন পোস্ট তৈরি এবং সংরক্ষণ*/
$newPost = new Post(null, 'My New Post', 'This is the content of the new post.');
$postRepository->save($newPost);

/* সব পোস্ট প্রদর্শন*/
$posts = $postRepository->findAll();
foreach ($posts as $post) {
    echo $post->getTitle() . '<br>';
}

/* নির্দিষ্ট পোস্ট খুঁজে পাওয়া*/
$post = $postRepository->find(1);
if ($post) {
    echo $post->getTitle();
}

/* পোস্ট মুছে ফেলা*/
$postRepository->delete(2);

