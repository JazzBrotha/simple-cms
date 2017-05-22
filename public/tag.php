<?php 
require '../app/start.php';
require APP_ROOT . '/classes/posts.php';
require APP_ROOT . '/classes/users.php';
require APP_ROOT . '/classes/likes.php';

if (!isset($_GET['tag'])) {
    header('Location: ' . BASE_URL);
}
$tag = $_GET['tag'];
$posts = $POSTS->get_tag_posts($tag);
$likeCount = $LIKES->count_likes();

$headTitle = 'Tag ' . $tag;
require VIEW_ROOT . '/public/tag.php';