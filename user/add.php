<?php

require '../app/start.php';
require APP_ROOT . '/classes/post.php';

if (!isset($_SESSION)) {
  session_start();
}

$userId = $_SESSION["user_id"];

if (!empty($_POST)) {

  $insertPage = new Post($userId, $_POST['title'], $_POST['body'], $_POST['tags'], $pdo);
  $insertPage->store_post();

  header('Location: ' . BASE_URL . '/user/list.php');
}

require VIEW_ROOT . '/user/add.php';
