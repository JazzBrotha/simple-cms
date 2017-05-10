<?php

require '../app/start.php';
require APP_ROOT . '/classes/users.php';
require APP_ROOT . '/classes/posts.php';

if (!isset($_SESSION)) {
  session_start();
}

$userId = $_SESSION['user_id'];
$postId = $_GET['post_id'];
//checking user right to delete page
$hasAccess = Users::has_access($userId, $postId, $pdo);

if ($hasAccess) {
  Posts::delete_post($postId, $pdo);
  header('Location: ' . BASE_URL . '/user/list.php?success=deleted');
} else {
    header('Location: ' . BASE_URL . '/user/list.php?access=false');
  die();
}

if (!isset($_GET['post_id'])) {
  header('Location: ' . BASE_URL . '/user/list.php');
  die();
}

require VIEW_ROOT . '/user/delete.php';