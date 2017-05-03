<?php
require 'app/start.php';
require 'app/classes/posts.php';

if (empty($_GET['post_id'])) {
  $page = false;
} else {

  //moved to Posts->get_full_post()
  // $slug = $_GET['page'];
  // $page = $pdo->prepare("
  //   SELECT *
  //   FROM pages
  //   WHERE slug = :slug
  //   LIMIT 1
  // ");
  // $page->execute(['slug' => $slug]);
  // $page = $page->fetch(PDO::FETCH_ASSOC);

  $page = Posts::get_full_post($pdo);
  
  //should be made a function also?
  if ($page) {
    $page['created'] = new DateTime($page['created']);
    if ($page['updated']) {
      $page['updated'] = new DateTime($page['updated']);

    }
  }
}

require VIEW_ROOT . '/page/show.php';
