<?php

require '../app/start.php';
require '../app/classes/posts.php';
$userId = $_SESSION["user_id"];
$currentPage = 'list.php';

$userPosts = $POSTS->get_user_posts($userId);


require VIEW_ROOT . '/user/list.php';