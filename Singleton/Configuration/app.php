<?php
class Configuration {
    private static $instance = null;
    private $settings = [];

    private function __construct() {
        $this->settings = [
            'database_host' => 'localhost',
            'database_name' => 'my_database',
            'database_user' => 'root',
            'database_password' => ''
        ];
    }
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Configuration();
        }
        return self::$instance;
    }
    /*Configuration Setting Power Mood*/
    public function get($key) {
        return isset($this->settings[$key]) ? $this->settings[$key] : null;
    }
    /*Set Configuration Setting Power Mood*/
    public function set($key, $value) {
        $this->settings[$key] = $value;
    }
    // private function __clone() {}
    // private function __wakeup() {}
}