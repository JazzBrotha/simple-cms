<?php

require '../app/start.php';
require '../app/classes/posts.php';

//här måste nåt kollas så att vi hämtar listan från en specifik användare
$user_id = 1; 
$pages = Posts::get_user_posts($pdo, $user_id);

//moved to function Posts->get_user_posts

// $pages = $pdo->query("
//   SELECT id, label, title, slug
//   FROM pages
//   ORDER BY created DESC
// ")->fetchAll(PDO::FETCH_ASSOC);

require VIEW_ROOT . '/user/list.php';
