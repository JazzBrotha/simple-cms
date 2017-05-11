<?php

require '../app/start.php';
require APP_ROOT . '/classes/users.php';
require APP_ROOT . '/classes/user.php';

//check if user is logged in & set the correct user id
if ($_SESSION['loggedin']) {
  $userId = $_SESSION["user_id"];
} else {
  header('Location: ' . BASE_URL . '/public/login.php?forced=true');
}

//check if update is posted
if (!empty($_POST)) {
  $updateUser = new User($_POST['username'], null, $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['profession'], $_POST['description'], $pdo);
  $updateUser->update_user($userId);

  header('Location: ' . BASE_URL . '/user/list.php?success=updated');

}

$user = $USERS->get_full_user($userId);

require VIEW_ROOT . '/user/edit_user.php';
