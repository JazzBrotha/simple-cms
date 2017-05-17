<?php

require '../app/start.php';
require '../app/classes/posts.php';
require APP_ROOT . '/classes/users.php';


$userId = $_SESSION["user_id"];
$user = $USERS->get_full_user($userId);
$currentPage = 'list.php';

$userPosts = $POSTS->get_user_posts($userId);


require VIEW_ROOT . '/user/list.php';