<?php
require 'app/start.php';
require 'app/classes/posts.php';
require 'app/classes/users.php';
require 'app/classes/likes.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$pages = Posts::get_all_posts($pdo);

// usort($pages, "sortByDate");
//
// $count = count($pages);
// if ($count > 10) {
//   $pagesSplit = array_chunk($pages, 10);
// }
// else {
//   $pagesSplit = $pages;
// }

//checking at index if user is logged in to display navbar correctly etc.
if (!isset($_SESSION['loggedin'])){
    $_SESSION['loggedin'] = false;
};
require VIEW_ROOT . '/home.php';
