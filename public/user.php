<?php
require '../app/start.php';
require APP_ROOT . '/classes/posts.php';
require APP_ROOT . '/classes/users.php';
require APP_ROOT . '/classes/likes.php';


if (!isset($_GET['user_id'])) {
    header('Location: ' . BASE_URL);
}
$userId = $_GET['user_id'];


$posts = Posts::get_user_posts($pdo, $userId);
$user = Users::get_full_user($userId, $pdo);

require VIEW_ROOT . '/public/user.php';