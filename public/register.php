<?php
require '../app/start.php';
require APP_ROOT . '/classes/user.php';

if (!empty($_POST)) {

	$password = $_POST["password"];

	$encryptpwd = password_hash($password, PASSWORD_DEFAULT);

    $newUser = new User($_POST["username"], $encryptpwd, $_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["profession"], $_POST["description"], $pdo);
		$checkUser = $pdo->prepare("SELECT username
				FROM users
				WHERE username = '$newUser->username'
				");
		$checkUser->execute();

		if ($checkUser->rowCount() > 0) {
			echo 'Sorry, username already exists';
		}
		else {
			$newUser->store_user();
	    header('Location: ' . BASE_URL . '/user/list.php');
		}

}

require VIEW_ROOT . '/public/register.php';
