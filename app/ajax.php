<?php
require 'start.php';
require 'classes/posts.php';
require 'classes/users.php';
require 'classes/likes.php';


if(isset($_POST['action']) && !empty($_POST['action'])) {
  $pages = Posts::get_next_posts($pdo);
}


require VIEW_ROOT . '/home.php';
// if(isset($_POST['action']) && !empty($_POST['action'])) {
//     $action = $_POST['action'];
//     switch($action) {
//
//     }
// }



?>
