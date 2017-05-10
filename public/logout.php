<?php
require '../app/start.php';

if (!isset($_SESSION)) {
  session_start();
}
session_destroy();

session_start();
$_SESSION['loggedin'] = false;

header('Location: ' . BASE_URL . '/index.php');
