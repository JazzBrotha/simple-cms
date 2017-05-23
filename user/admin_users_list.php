<?php

require '../app/start.php';
require '../app/classes/users.php';

$userId = $_SESSION["user_id"];
$user = $USERS->get_full_user($userId);

if ($_SESSION['loggedin'] && $_SESSION['is_admin']) {
    $currentPage = 'admin_users_list.php';
    $allUsers = $USERS->get_all_users();
    require VIEW_ROOT . '/user/admin_users_list.php';

} else {
    header('Location: ' . BASE_URL . '/user/list.php?access=denied');
    die();
}
