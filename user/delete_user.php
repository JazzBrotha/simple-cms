<?php
require '../app/start.php';
require APP_ROOT . '/classes/users.php';

$userId = $_SESSION["user_id"];

$user = Users::delete_user($userId, $pdo);

session_unset();
session_destroy();

header('Location: ' . BASE_URL . '/index.php');
