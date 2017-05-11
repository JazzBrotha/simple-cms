<?php
require 'start.php';
require 'classes/posts.php';
require 'classes/users.php';
require 'classes/likes.php';


if(isset($_POST['next']) && !empty($_POST['next'])) {
  $pages = $POSTS->get_next_posts();
}

if(isset($_POST['prev']) && !empty($_POST['prev'])) {
  $pages = $POSTS->get_prev_posts();
}


require VIEW_ROOT . '/home.php';



?>
