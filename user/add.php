<?php

require '../app/start.php';
require APP_ROOT . '/classes/post.php';

if (!empty($_POST)) {

  //Måste ändras till variabeln i Session
  $userId = 1;
  $insertPage = new Post($userId, $_POST['title'], $_POST['body'], $_POST['tags'], $pdo);
  $insertPage->store_post();

  header('Location: ' . BASE_URL . '/user/list.php');
}

require VIEW_ROOT . '/user/add.php';
