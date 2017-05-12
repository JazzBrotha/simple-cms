<?php
require 'start.php';
require 'classes/posts.php';
require 'classes/users.php';
require 'classes/likes.php';


if(isset($_POST['next']) && !empty($_POST['next'])) {
  var_dump($_POST['next']);
  $pages = Posts::get_next_posts($pdo);
}

if(isset($_POST['prev']) && !empty($_POST['prev'])) {
  $pages = Posts::get_prev_posts($pdo);
}


require VIEW_ROOT . '/home.php';



?>
