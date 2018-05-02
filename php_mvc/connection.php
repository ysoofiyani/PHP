<?php
class Db {
    private static $instance = null;
    private function _construct() {}
private function _clone() {}
public static function getInstance() {
    if (!isset(self::$instance)) {
        $pdo_option[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        self::$instance = new PDO('mysql:host=localhost;dbname=php_mvc', 'root', '', $pdo_option);
    }
    return self::$instance;
}
}