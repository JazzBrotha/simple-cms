<?php
require '../app/start.php';
require APP_ROOT . '/classes/posts.php';
require APP_ROOT . '/classes/users.php';
require APP_ROOT . '/classes/likes.php';


if (!isset($_GET['user_id'])) {
    header('Location: ' . BASE_URL);
}
$userId = $_GET['user_id'];
$likeCount = $LIKES->count_likes();

$posts = $POSTS->get_user_posts($userId);
$user = $USERS->get_full_user($userId);

require VIEW_ROOT . '/public/user.php';