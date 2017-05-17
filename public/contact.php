<?php
require '../app/start.php';

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['loggedin'])){
    $_SESSION['loggedin'] = false;
};

$headTitle = 'Contact';
require VIEW_ROOT . '/public/contact.php';
