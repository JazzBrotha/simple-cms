<?php

require '../app/start.php';
require APP_ROOT . '/classes/users.php';
require APP_ROOT . '/classes/user.php';

if (!isset($_SESSION)) {
  session_start();
}


$userId = $_SESSION["user_id"];

if (!empty($_POST)) {

  $updateUser = new User($_POST['username'], null, $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['profession'], $_POST['description'], $pdo);
  $updateUser->update_user($userId);

  header('Location: ' . BASE_URL . '/user/list.php');

}

if (!isset($_GET['user_id'])) {
    header('Location: ' . BASE_URL . '/user/list.php');
    die();
}

$user = Users::get_full_user($pdo);
require VIEW_ROOT . '/user/edit_user.php';
