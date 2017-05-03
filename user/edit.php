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


  //old post update
  // $id = $_POST['id'];
  // $label = $_POST['label'];
  // $title = $_POST['title'];
  // $slug = $_POST['slug'];
  // $body = $_POST['body'];

  // $updatePage = $pdo->prepare("
  //   UPDATE pages
  //   SET
  //     label = :label,
  //     title = :title,
  //     slug = :slug,
  //     body = :body,
  //     updated = NOW()
  //   WHERE id = :id
  // ");

  // $updatePage->execute([
  //   'id' => $id,
  //   'label' => $label,
  //   'title' => $title,
  //   'slug' => $slug,
  //   'body' => $body,
  // ]);

  header('Location: ' . BASE_URL . '/user/list.php');

}

if (!isset($_GET['post_id'])) {
  header('Location: ' . BASE_URL . '/user/list.php');
  die();
}

$page = Posts::get_full_post($pdo);

//We already had a function for this
// $page = $pdo->prepare("
//   SELECT id, title, label, body, slug
//   FROM pages
//   WHERE id = :id
// ");

// $page->execute(['id' => $_GET['id']]);
// $page = $page->fetch(PDO::FETCH_ASSOC);

require VIEW_ROOT . '/user/edit.php';
