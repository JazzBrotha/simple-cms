<?php

require '../app/start.php';

if (!empty($_POST)) {
  $label = $_POST['label'];
  $title = $_POST['title'];
  $slug = $_POST['slug'];
  $body = $_POST['body'];

  $insertPage = $pdo->prepare("
  INSERT INTO pages(label, title, slug, body, created)
  VALUES (:label, :title, :slug, :body, NOW())
  ");

  $insertPage->execute([
    'label' => $label,
    'title' => $title,
    'slug' => $slug,
    'body' => $body,
  ]);

  header('Location: ' . BASE_URL . '/user/list.php');
}

require VIEW_ROOT . '/user/add.php';
