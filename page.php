<?php
require 'app/start.php';
require 'app/classes/posts.php';
require 'app/classes/likes.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (empty($_GET['post_id'])) {
  $page = false;
} else {

  $page = Posts::get_full_post($pdo);
  $likes = Likes::count_likes($pdo);

  if ($page) {
    $page['created'] = new DateTime($page['created']);
    $likes->bindParam(':post_id', $_GET['post_id']);
    $likes->execute();
    $result = $likes->fetch(PDO::FETCH_ASSOC);
    $page['likes'] = $result['COUNT(*)'];

    if ($_SESSION['loggedin']){
      //returns true or false
      $page['user_liked'] = Likes::check_like($_GET['post_id'], $_SESSION['user_id'], $pdo);
    } else {
      $page['user_liked'] = false;
    }

    if ($page['updated']) {
      $page['updated'] = new DateTime($page['updated']);

    }
  }
}

require VIEW_ROOT . '/page/show.php';
