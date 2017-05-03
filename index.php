<?php
require 'app/start.php';
require 'app/classes/posts.php';

//old
// $pages = $pdo->query("
//   SELECT id, label, slug
//   FROM pages
// ")->fetchAll(PDO::FETCH_ASSOC);

$pages = Posts::get_all_posts($pdo);
require VIEW_ROOT . '/home.php';