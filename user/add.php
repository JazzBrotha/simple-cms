<?php

require '../app/start.php';
require APP_ROOT . '/classes/post.php';

if (!empty($_POST)) {

  //old
  // $label = $_POST['label'];
  // $title = $_POST['title'];
  // $slug = $_POST['slug'];
  // $body = $_POST['body'];

  // $insertPage = $pdo->prepare("
  // INSERT INTO pages(label, title, slug, body, created)
  // VALUES (:label, :title, :slug, :body, NOW())
  // ");

//   $insertPage->execute([
//   'label' => $label,
//   'title' => $title,
//   'slug' => $slug,
//   'body' => $body,
// ]);

  //Måste ändras till variabeln i Session
  $userId = 1;
  $insertPage = new Post($userId, $_POST['title'], $_POST['body'], $_POST['tags'], $pdo);
  $insertPage->store_post();

  header('Location: ' . BASE_URL . '/user/list.php');
}

require VIEW_ROOT . '/user/add.php';
