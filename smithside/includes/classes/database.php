<?php

/*
 * Database Class
 */

class database {

    private static $user_name = 'root';
    private static $user_password = 'root';
    private static $database_name = 'smithside';
    private static $host_name = 'localhost';
    private static $conn = null;

    /* beacuse the method is static method use self::$property_name
     * 
     */

    public static function getConnection() {
        if (!self::$conn) {
            self::$conn = new mysqli(self::$host_name, self::$user_name, self::$user_password, self::$database_name);
            if (self::$conn->connect_error) {
                die('Connect Error: ' . self::$conn->connect_error);
            }
        }
        return self::$conn;
    }
    
    private function __construct() {
        
    }
}
