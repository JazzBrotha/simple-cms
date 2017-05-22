<?php

require '../app/start.php';
require '../app/classes/posts.php';
require APP_ROOT . '/classes/users.php';
$userId = $_SESSION["user_id"];
$user = $USERS->get_full_user($userId);

if ($_SESSION['loggedin'] && $_SESSION['is_admin']) {
    $currentPage = 'admin_list.php';
    $allPosts = $POSTS->get_all_posts();
    require VIEW_ROOT . '/user/admin_list.php';

} else {
    header('Location: ' . BASE_URL . '/user/list.php?access=denied');
    die();
}




