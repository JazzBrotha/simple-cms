<?php

require '../app/start.php';
require APP_ROOT . '/classes/post.php';
require APP_ROOT . '/classes/posts.php';

if (!empty($_POST)) {

  //kanske bra att göra en dubbelkoll här: hämta user från session o bara kunna uppdatera post om det matchar user som skapade posten i DB
  //ändra nedan:
  $userId = 1;

  $updatePage = new Post($userId, $_POST['title'], $_POST['body'], $_POST['tags'], $pdo);
  $updatePage->update_post($_POST['post_id']);

  header('Location: ' . BASE_URL . '/user/list.php');

}

if (!isset($_GET['post_id'])) {
  header('Location: ' . BASE_URL . '/user/list.php');
  die();
}

$page = Posts::get_full_post($pdo);

require VIEW_ROOT . '/user/edit.php';
