<?php

require '../app/start.php';

if (isset($_GET['id'])) {
  $deletePage = $pdo->prepare("
    DELETE FROM pages
    WHERE id = :id
  ");
  $deletePage->execute(['id' => $_GET['id']]);
}

header('Location: ' . BASE_URL . '/user/list.php');

require VIEW_ROOT . '/user/delete.php';
