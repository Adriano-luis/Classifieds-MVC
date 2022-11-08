<?php
    require "environment.php";

    $config = array();
    if(ENVIRONMENT == 'development'){
        define("BASE_URL", "http://localhost/");
        $config['dbname'] = '';
        $config['dbhost'] = ''; 
        $config['dbuser'] = '';
        $config['dbpass'] = '';
    }else{
        define("BASE_URL", "");
        $config['dbname'] = "";
        $config['dbhost'] = "";
        $config['dbuser'] = "";
        $config['dbpass'] = "";
    } 

    try {
        global $db;
        $db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['dbhost'],$config['dbuser'], $config['dbpass']);
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage();
        exit();
    }