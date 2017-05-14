<?php
require 'start.php';
require 'classes/posts.php';
require 'classes/users.php';
require 'classes/likes.php';
$likeCount = $LIKES->count_likes();

$pages = $POSTS->get_all_posts();

require VIEW_ROOT . '/home.php';

// if(isset($_POST['page']) && !empty($_POST['page'])) {
//   $pageNumber = $_POST['page'];
//   $offset = $pageNumber * 10;
//   $posts = $POSTS->get_next_posts();
//   $posts->bindParam(':page', $offset);
//   $posts->execute();
//   $pages = $posts->fetchAll(PDO::FETCH_ASSOC);
// }




?>
