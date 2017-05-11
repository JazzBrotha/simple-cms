<?php
require '../app/start.php';
require APP_ROOT . '/classes/users.php';

$userId = $_SESSION["user_id"];

$user = $USERS->delete_user($userId);

session_unset();
session_destroy();

header('Location: ' . BASE_URL . '/index.php');
