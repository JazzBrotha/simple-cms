<?php

require '../app/start.php';
require '../app/classes/posts.php';

if ($_SESSION['loggedin'] && $_SESSION['is_admin']) {
    $allPosts = $POSTS->get_all_posts();
    require VIEW_ROOT . '/user/admin_list.php';

} else {
    header('Location: ' . BASE_URL . '/user/list.php?access=denied');
    die();
}




