<?php
require 'app/start.php';
require 'app/classes/posts.php';
require 'app/classes/likes.php';

if (!isset($_SESSION)) {
    session_start();
}

if (empty($_GET['post_id'])) {
  $page = false;
} else {

  $page = Posts::get_full_post($pdo);

  if ($page) {
    $page['created'] = new DateTime($page['created']);
    $page['likes'] = Likes::count_likes($_GET['post_id'], $pdo);

    if ($_SESSION['loggedin']){
      //returns true or false
      $page['user_liked'] = Likes::check_like($_GET['post_id'], $_SESSION['user_id'], $pdo);
    } else {
      $page ['user_liked'] = false;
    }

    if ($page['updated']) {
      $page['updated'] = new DateTime($page['updated']);

    }
  }
}

require VIEW_ROOT . '/page/show.php';
