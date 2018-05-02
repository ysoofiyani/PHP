<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function __autoload($class_name){
    try{
        $class_file ='includes/2classes/' .strtolower($class_name). '.php';
        if(is_file($class_file)){
            require_once $class_file;
        } else {
            throw new Exception("Unable to load $class_name in file $class_file");
        }
    } catch (Exception $ex) {
echo 'Exception caught: ', $ex->getMessage(), "/n";
    }
}

//includes required files
require_once 'includes/functions.php';