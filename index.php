<?php
require 'app/start.php';
require 'app/classes/posts.php';
require 'app/classes/users.php';

$pages = Posts::get_all_posts($pdo);
$user = Users::get_user_name($pdo);

usort($pages, "sortByDate");

$count = count($pages);
if ($count > 10) {
  $pagesSplit = array_chunk($pages, 10);
}
else {
  $pagesSplit = $pages;
}

// echo json_encode($pagesSplit);

require VIEW_ROOT . '/home.php';
