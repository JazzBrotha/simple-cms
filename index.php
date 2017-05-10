<?php
require 'app/start.php';
require 'app/classes/posts.php';
require 'app/classes/users.php';
require 'app/classes/likes.php';

$pages = Posts::get_all_posts($pdo);

//checking at index if user is logged in to display navbar correctly etc.
if (!isset($_SESSION['loggedin'])){
    $_SESSION['loggedin'] = false;
};

require VIEW_ROOT . '/home.php';
var_dump($_SESSION);