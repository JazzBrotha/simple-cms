<?php 
require '../app/start.php';
require APP_ROOT . '/classes/user.php';

if (!empty($_POST)) {

	$password = $_POST["password"];

	$encryptpwd = password_hash($password, PASSWORD_DEFAULT);
    
    $newUser = new User($_POST["username"], $encryptpwd, $_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["profession"], $_POST["description"], $pdo);
    $newUser->store_user();

    header('Location: ' . BASE_URL . '/user/list.php');
}

require VIEW_ROOT . '/public/register.php';
