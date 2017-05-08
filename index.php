<?php
require 'app/start.php';
require 'app/classes/posts.php';

$pages = Posts::get_all_posts($pdo);
require VIEW_ROOT . '/home.php';