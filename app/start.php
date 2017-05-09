<?php
require 'password.php';
require 'functions.php';

//Directory VARS
define('APP_ROOT', __DIR__);
define('VIEW_ROOT', APP_ROOT . '/views');
define('BASE_URL', 'http://localhost/simple-cms');

// Display errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Main PDO object
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false
    ];

$pdo = new PDO(
    "mysql:host=johnny.heliohost.org;dbname=phpgrupp_cms;charset=utf8",
    "phpgrupp",
    $db_pass,
    $options
    );
