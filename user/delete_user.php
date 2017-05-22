<?php
require '../app/start.php';
require APP_ROOT . '/classes/users.php';

$isAdmin = $_SESSION['is_admin'];

if ($isAdmin) {
  $userId = $_GET['user_id'];
  $USERS->delete_user($userId);
  header('Location: ' . BASE_URL . '/user/admin_users_list.php?success=deleted');
} else if (!$isAdmin && $_SESSION['loggedin']) {
    $userId = $_SESSION["user_id"];
    $USERS->delete_user($userId);
    session_unset();
    session_destroy();
    header('Location: ' . BASE_URL . '/index.php');
} else {
    header('Location: ' . BASE_URL . '/user/list.php?access=denied');
    die();
  }


require VIEW_ROOT . '/user/delete_user.php';
