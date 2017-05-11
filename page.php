<?php
require 'app/start.php';
require 'app/classes/posts.php';
require 'app/classes/likes.php';

if (empty($_GET['post_id'])) {
  $page = false;
} else {

  $page = $POSTS->get_full_post();

  if ($page) {
    $page['created'] = new DateTime($page['created']);
    $page['likes'] = $LIKES->count_likes($_GET['post_id']);

    if ($_SESSION['loggedin']){
      //returns true or false
      $page['user_liked'] = $LIKES->check_like($_GET['post_id'], $_SESSION['user_id']);
    } else {
      $page ['user_liked'] = false;
    }

    if ($page['updated']) {
      $page['updated'] = new DateTime($page['updated']);

    }
  }
}

require VIEW_ROOT . '/page/show.php';
