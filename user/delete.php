<?php

require '../app/start.php';
require APP_ROOT . '/classes/users.php';
require APP_ROOT . '/classes/posts.php';

$userId = $_SESSION['user_id'];
$postId = $_GET['post_id'];

//checking user right to delete page by ownership...
$hasAccess = $USERS->has_access($userId, $postId);
//... or admin
$isAdmin = $_SESSION['is_admin'];

if ($hasAccess || $isAdmin) {
  $POSTS->delete_post($postId);
  //sending back to admin list view if we came from there
  if ($_GET['admin']) {
  header('Location: ' . BASE_URL . '/user/admin_list.php?success=deleted');
  } else {
    header('Location: ' . BASE_URL . '/user/list.php?success=deleted');
  }
//no access
} else {
    header('Location: ' . BASE_URL . '/user/list.php?access=denied');
  die();
}

if (!isset($_GET['post_id'])) {
  header('Location: ' . BASE_URL . '/user/list.php');
  die();
}

require VIEW_ROOT . '/user/delete.php';
