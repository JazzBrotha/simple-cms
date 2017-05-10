<?php

require '../app/start.php';

//här måste vi kolla att användare är inloggad och är user_id för inlägget med post_id, annars kan man ta bort
//andras inlägg genom att skriva in query

if (isset($_GET['post_id'])) {
  $deletePage = $pdo->prepare("
    DELETE FROM posts
    WHERE post_id = :id
  ");
  $deletePage->execute([':id' => $_GET['post_id']]);
}

header('Location: ' . BASE_URL . '/user/list.php');

require VIEW_ROOT . '/user/delete.php';
