<?php

require '../app/start.php';
require '../app/classes/posts.php';

$userId = $_SESSION["user_id"];

$userPosts = Posts::get_user_posts($pdo, $userId);


require VIEW_ROOT . '/user/list.php';
