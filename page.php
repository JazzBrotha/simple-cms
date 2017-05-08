<?php
require 'app/start.php';
require 'app/classes/posts.php';
require 'app/classes/likes.php';

if (empty($_GET['post_id'])) {
  $page = false;
} else {


  $page = Posts::get_full_post($pdo);
  
  if ($page) {
    $page['created'] = new DateTime($page['created']);
    $page['likes'] = Likes::count_likes($_GET['post_id'], $pdo);
    if ($page['updated']) {
      $page['updated'] = new DateTime($page['updated']);

    }
  }
}

require VIEW_ROOT . '/page/show.php';
