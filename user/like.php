<?php
require '../app/start.php';
require APP_ROOT . '/classes/likes.php';


//get from session
$userId = 1;

if (empty($_GET['post_id'])) {
    header('Location: ' . BASE_URL);
}else {
    $post = $_GET['post_id'];
    Likes::add_like($post, $userId, $pdo);
    //return to the page were u came from
    header('Location: ' . BASE_URL . '/page.php?post_id=' . $post);
}