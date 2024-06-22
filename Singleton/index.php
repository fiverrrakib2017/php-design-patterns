<?php
require 'Configuration/app.php';

$config=Configuration::getInstance();


/*Set Configuration Setting Power Mood*/
$config->set('site_name', 'School Management System');
$config->set('admin_email', 'rakibas375@gmail.com');
/*Get Configuration Setting Power Mood*/
echo $config->get('site_name'); 
echo '<br>';
echo '<br>';
echo $config->get('admin_email');
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
/*Just Get One instance*/
$anotherConfig = Configuration::getInstance();
echo $anotherConfig->get('site_name'); 
echo '<br>';
echo '<br>';
if ($config === $anotherConfig) {
    echo "Both instances are the same.";
}