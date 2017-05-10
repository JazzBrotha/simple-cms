<?php

require '../app/start.php';
require APP_ROOT . '/classes/post.php';
require APP_ROOT . '/classes/posts.php';
require APP_ROOT . '/classes/users.php';

$userId = $_SESSION['user_id'];
//checking user right to edit page
$hasAccess = Users::has_access($userId, $_GET['post_id'], $pdo);

//if access...
if ($hasAccess){
  //and update is posted...
  if (!empty($_POST)) {
    $updatePage = new Post($userId, $_POST['title'], $_POST['body'], $_POST['tags'], $pdo);
    $updatePage->update_post($_POST['post_id']);
    header('Location: ' . BASE_URL . '/user/list.php?success=updated');
  }

  $page = Posts::get_full_post($pdo);
  require VIEW_ROOT . '/user/edit.php';
//no access
} else {
    header('Location: ' . BASE_URL . '/user/list.php?access=denied');
  die();
}

if (!isset($_GET['post_id'])) {
  header('Location: ' . BASE_URL . '/user/list.php');
  die();
}
