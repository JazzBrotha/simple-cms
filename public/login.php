<?php

require '../app/start.php';

$loggedIn = false;

if ($loggedIn) {
    echo "logged in!";
} else {
    require VIEW_ROOT . '/public/login.php';
}

?>
