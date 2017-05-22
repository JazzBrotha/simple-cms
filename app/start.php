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
    PDO::ATTR_EMULATE_PREPARES   => false,
    PDO::MYSQL_ATTR_INIT_COMMAND =>"SET time_zone = '+02:00'"
    ];

//NEW HELIOHOST SERVER
// $pdo = new PDO(
//     "mysql:host=tommy.heliohost.org;dbname=jengstro_phpgrupp_cms;charset=utf8",
//     "jengstro",
//     $db_pass,
//     $options
//     );

//OLD HELIOHOST SERVER
$pdo = new PDO(
    "mysql:host=johnny.heliohost.org;dbname=phpgrupp_cms;charset=utf8",
    "phpgrupp",
    $db_pass,
    $options
    );

//LOCALHOST DB
// $pdo = new PDO(
    // "mysql:host=localhost;dbname=phpgrupp_cms;charset=utf8",
    // "root",
    // "root",
    // $options
    // );


if (!isset($_SESSION)) {
  session_start();
}
// Check when user last was active and log out if inactive
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    session_unset();
    session_destroy();
    header('Location: ' . BASE_URL . '/index.php');
}
// Set new time if active
$_SESSION['LAST_ACTIVITY'] = time();

// Regenerate session id if user is active long
if (!isset($_SESSION['CREATED'])) {
    $_SESSION['CREATED'] = time();
} else if (time() - $_SESSION['CREATED'] > 1800) {
    session_regenerate_id(true);
    $_SESSION['CREATED'] = time();
}
