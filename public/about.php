<?php
require '../app/start.php';

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['loggedin'])){
    $_SESSION['loggedin'] = false;
};


require VIEW_ROOT . '/public/about.php';
