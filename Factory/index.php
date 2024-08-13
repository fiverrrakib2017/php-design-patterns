<?php

interface Notification{
    public function sendNotification(); 
}
class EmailNotification implements Notification{
    public function sendNotification(){
        echo "Email Notification";
    }
}
class SMSNotification implements Notification {
    public function sendNotification() {
        echo "Sending SMS Notification";
    }
}

class PushNotification implements Notification {
    public function sendNotification() {
        echo "Sending Push Notification";
    }
}

class NotificationFactory{
    public static function createNotification($type){
        switch($type){
            case 'email':
                return new EmailNotification();
            case 'sms':
                return new SMSNotification();
            case 'push':
                return new PushNotification();
            default:
                return null;
        }
    }
}

/* Use the Factory to create objects*/
try {
    $notificationType = 'push'; 
    $notification = NotificationFactory::createNotification($notificationType);
    $notification->sendNotification();
} catch (Exception $e) {
    echo $e->getMessage();
}