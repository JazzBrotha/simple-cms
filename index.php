<?php
require 'app/start.php';
require 'app/classes/posts.php';
require 'app/classes/users.php';
require 'app/classes/likes.php';

$pages = Posts::get_all_posts($pdo);

if(isset($_POST['action']) && !empty($_POST['action'])) {
  $pages = Posts::get_next_posts($pdo);
  var_dump($pages);
}

require VIEW_ROOT . '/home.php';
