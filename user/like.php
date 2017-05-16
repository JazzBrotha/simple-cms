<?php
require '../app/start.php';
require APP_ROOT . '/classes/likes.php';

//if we don't have a query string, send back to index
if (empty($_GET['post_id'])) {
    header('Location: ' . BASE_URL);
}
//If user not logged in, send to login.
if (!$_SESSION['loggedin']){
    header('Location: ' . BASE_URL . '/public/login.php?forced=true');
}
//if user is logged in...
if ($_SESSION['loggedin']) {
    $userId = $_SESSION['user_id'];
    $post = $_GET['post_id'];
    //checking for existing like once again to prevent url query cheating
    $liked = $LIKES->check_like($post, $userId);

    //either like or unlike and return where u came from
    if ($_GET['action'] === 'like' && !$liked) {
        //Borde kanske kolla med check_like här igen
        $LIKES->add_like($post, $userId);
    }
    if ($_GET['action'] === 'unlike' && $liked) {
        $LIKES->remove_like($post, $userId);
    }
    header('Location: ' . BASE_URL . '/page.php?post_id=' . $post);

}
