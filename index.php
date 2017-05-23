<?php
require 'app/start.php';
require 'app/classes/posts.php';
require 'app/classes/users.php';
require 'app/classes/likes.php';


$posts = $POSTS->get_first_ten_posts();
$likeCount = $LIKES->count_likes();
$headTitle = 'Home';



// echo $LIKES->count_likes($page['post_id']);

//checking at index if user is logged in to display navbar correctly etc.
if (!isset($_SESSION['loggedin'])){
    $_SESSION['loggedin'] = false;
};

require VIEW_ROOT . '/home.php';
