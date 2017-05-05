<?php

require '../app/start.php';
require '../app/classes/posts.php';

//här måste nåt kollas så att vi hämtar listan från en specifik användare
$userId = 1; 
$pages = Posts::get_user_posts($pdo, $userId);

require VIEW_ROOT . '/user/list.php';
