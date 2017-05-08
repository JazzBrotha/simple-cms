<?php
require 'app/start.php';
require 'app/classes/posts.php';

if (empty($_GET['post_id'])) {
  $page = false;
} else {


  $page = Posts::get_full_post($pdo);
  
  if ($page) {
    $page['created'] = new DateTime($page['created']);
    if ($page['updated']) {
      $page['updated'] = new DateTime($page['updated']);

    }
  }
}

require VIEW_ROOT . '/page/show.php';
